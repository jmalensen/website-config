<?php

namespace App\Http\Controllers\UserConf;

use App\Http\Controllers\Controller;

use App\Http\Requests\Step1CompanyRequest;
use App\Http\Requests\Step3CompanyRequest;
use App\Http\Requests\Step4CompanyRequest;
use App\Http\Requests\Step5CompanyRequest;
use App\Http\Requests\Step6CompanyRequest;
use App\Http\Requests\Step7CompanyRequest;
use App\Http\Requests\Step9EkoUsageRequest;
use App\Http\Requests\StepEkoUsageRequest;
use App\Models\Company;
use App\Models\EkoUsage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller {

    private $authMimetype = [
        "image/jpeg",
        "image/png"
    ];
    private $maxSizeFile = 2000000;


    /**
     * Create registration of Company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function registerCompany(){
        $authUser = Auth::user();

        return view('userconf.registercompany', compact('authUser'));
    }

    /**
     * Create or get company object
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createGetCompany(Request $request){
        $this->isAjaxOrFail($request);

        $authUser = Auth::user();
        if(!empty($authUser->company_id) ){
            $company = Company::with('ekoUsage')->findOrFail($authUser->company_id);
        } else{
            $company = new Company();
        }

        return response()->json($company);
    }

    /**
     * Store country of form
     * @param Step1CompanyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
	public function storeCountry(Step1CompanyRequest $request) {
        $this->isAjaxOrFail($request);
        if(!$request->has('country')){
            return $this->ajaxDataMissing();
        }

        $data = $request->except(['eko_usage']);

        if(!empty(Auth::user()->company_id) ){
            $company = Company::findOrFail(Auth::user()->company_id);

            // If user change country
            if($company->country != $request->country){
                $company->fill(Company::$emptyAttributes);
                $company->ekoUsage()->update(EkoUsage::$emptyAttributes);
            }
        } else{
            $company = new Company();
        }

        $company->fill($data);

        if(empty(Auth::user()->company_id) && $company->save()){
            Auth::user()->company_id = $company->id;
            Auth::user()->save();

            // Create ekousage for company
            $company->ekoUsage()->create([
                'company_id' => $company->id,
            ]);
            $company->eko_usage_id = $company->ekoUsage->id;
            $company->update();

            $company = Company::with('ekoUsage')->findOrFail($company->id);
            return $this->jsonSuccess(compact('company'));

        } if(!empty(Auth::user()->company_id) && $company->update()){

            $company = Company::with('ekoUsage')->findOrFail($company->id);
            return $this->jsonSuccess(compact('company'));

        } else{
            return $this->jsonError('Votre pays n\'est pas passé dans notre moulinette !');
        }
	}

    /**
     * Store IdNumber (SIRET, RCSL) of form
     * @param Step3CompanyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeIdNumber(Step3CompanyRequest $request) {
        $this->isAjaxOrFail($request);

        $data = $request->except(['logo', 'eko_usage']);
        $company = Company::findOrFail(Auth::user()->company_id);

        $company->fill($data);

        if ($company->update()){
            $company = Company::with('ekoUsage')->findOrFail($company->id);
            return $this->jsonSuccess(compact('company'));
        }else{
            return $this->jsonError('Vos coordonnées n\'ont pas été enregistrées !');
        }
    }

    /**
     * Store legal part 1 of form
     * @param Step4CompanyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeLegal1(Step4CompanyRequest $request) {
        $this->isAjaxOrFail($request);

        if(!$request->has('social_reason')
            || !$request->has('address_line1')
            || !$request->has('zipcode')
            || !$request->has('city')
            || !$request->has('phone')
            || !$request->has('email') ){
            return $this->ajaxDataMissing();
        }

        $data = $request->except(['logo', 'eko_usage']);
        $company = Company::findOrFail(Auth::user()->company_id);

        $company->fill($data);

        if ($company->update()){
            $company = Company::with('ekoUsage')->findOrFail($company->id);
            return $this->jsonSuccess(compact('company'));
        }else{
            return $this->jsonError('Vos coordonnées n\'ont pas été enregistrées !');
        }
    }

    /**
     * Store logo of form
     * @param Step5CompanyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeLogo(Step5CompanyRequest $request) {
        $this->isAjaxOrFail($request);

        if(!$request->has('logo') ){
            return $this->ajaxDataMissing();
        }

        // Handle logo
        $data = $request->all();
        $company = Company::findOrFail(Auth::user()->company_id);

        // If there is a logo
        if($request->has('logo') && !empty($request->logo) ){

            $logo = $request->logo;

            // Create folder if there is none
            $this->get_local_dir($company->id);

            // Sanitize name of file
            $filename = $logo['filename'];
            $filename = $this->sanitize_french_string($filename);

            $base64 = $logo['base64'];

            // Check mimetype file
            $split = explode(';', $base64);
            $mimetype = str_replace('data:', '', $split[0]);
            if(!in_array($mimetype, $this->authMimetype)){
                return response()->json([
                    'success' => false,
                    'message' => __('company.only_jpg_png_mimetype')
                ]);
            }

            // Logo
            if (preg_match('/^data:image\/(\w+);base64,/', $base64)) {
                $size = (int) (strlen(rtrim($base64, '=')) * 3 / 4);

                // Size under 2Mo
                if($size >= $this->maxSizeFile){
                    return response()->json([
                        'success' => false,
                        'message' => __('company.logo_too_large')
                    ]);
                }

                $logoCompany = substr($base64, strpos($base64, ',') + 1);

                $logoCompany = base64_decode($logoCompany);

                $localDir = 'logosCompany/'.$company->id.'/'.$filename;
                $result = Storage::disk('public')
                    ->put($localDir, $logoCompany );

                $company->path_logo = 'storage/'.$localDir;
            }
        }

        if ($company->update()){
            $company = Company::with('ekoUsage')->findOrFail($company->id);
            return $this->jsonSuccess(compact('company'));
        }else{
            return $this->jsonError('Votre logo n\'a pas été enregistré !');
        }
    }

    /**
     * Store legal part 2 of form
     * @param Step6CompanyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeLegal2(Step6CompanyRequest $request) {
        $this->isAjaxOrFail($request);

        if(!$request->has('legal_form') ){
            return $this->ajaxDataMissing();
        }

        $data = $request->except('eko_usage');
        $company = Company::findOrFail(Auth::user()->company_id);

        $company->fill($data);

        if ($company->update()){
            $company = Company::with('ekoUsage')->findOrFail($company->id);
            return $this->jsonSuccess(compact('company'));
        }else{
            return $this->jsonError('Vos coordonnées n\'ont pas été enregistrées !');
        }
    }

    /**
     * Store legal part 3 of form
     * @param Step7CompanyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeLegal3(Step7CompanyRequest $request) {
        $this->isAjaxOrFail($request);

        if(!$request->has('iban') || !$request->has('bic_swift') ){
            return $this->ajaxDataMissing();
        }

        $data = $request->except('eko_usage');
        $company = Company::findOrFail(Auth::user()->company_id);

        $company->fill($data);

        if ($company->update()){
            $company = Company::with('ekoUsage')->findOrFail($company->id);
            return $this->jsonSuccess(compact('company'));
        }else{
            return $this->jsonError('Vos coordonnées bancaires n\'ont pas été enregistrées !');
        }
    }

    /**
     * Store choice of eko formula of form
     * @param Step9EkoUsageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeEkoChoice(Step9EkoUsageRequest $request) {
        $this->isAjaxOrFail($request);
        if(!$request->has('eko_type')){
            return $this->ajaxDataMissing();
        }

        $data = $request->except(['logo','eko_usage']);
        $company = Company::findOrFail(Auth::user()->company_id);

        if(!empty($company->eko_usage_id)){
            $ekoUsage = $company->ekoUsage()->update([
                'eko_type' => $data['eko_type']
            ]);

        }

        if ($company->update()){
            $company = Company::with('ekoUsage')->findOrFail($company->id);
            return $this->jsonSuccess(compact('company'));
        }else{
            return $this->jsonError('Votre choix de formule eKo n\'est pas passé !');
        }
    }

    /**
     * Store step Ekousage of form
     * @param StepEkoUsageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeStepEkoUsage(StepEkoUsageRequest $request) {
        $this->isAjaxOrFail($request);

        if(!$request->has('data_eko') ){
            return $this->ajaxDataMissing();
        }

        $data = $request->all();
        $company = Company::findOrFail(Auth::user()->company_id);

        $isUpdated = $company->ekoUsage()->update([
            'eko_type' => $data['eko_type'],
            'data_eko' => json_encode($data['data_eko']),
        ]);

        if ($isUpdated){
            $company = Company::with('ekoUsage')->findOrFail($company->id);
            return $this->jsonSuccess(compact('company'));
        }else{
            return $this->jsonError('Vos données n\'ont pas été enregistrées !');
        }
    }


    /************************************Private methods*********************************************/
    /**
     * Get directory to put files from import
     * @return string
     */
    private function get_local_dir($idCompany) {

        // Get path to storage folder
        $localDir = Storage::disk('public')->path('logosCompany/'.$idCompany);

        // Create specific folder for backup
        if (!Storage::disk('public')->exists('logosCompany/'.$idCompany)) {
            File::makeDirectory($localDir, 0711, true, true);
        }

        return $localDir;
    }

    /**
     * Clean names of files
     * @param $filename
     * @return bool|string|string[]|null
     */
    private function sanitize_french_string($filename){

        // Force the file name in UTF-8 (encoding Windows / OS X / Linux)
        $filename = mb_convert_encoding($filename, "UTF-8");

        $charNotClean = ['/À/','/Á/','/Â/','/Ã/','/Ä/','/Å/','/Ç/','/È/','/É/','/Ê/','/Ë/','/Ì/','/Í/','/Î/','/Ï/','/Ò/','/Ó/','/Ô/','/Õ/','/Ö/','/Ù/','/Ú/','/Û/','/Ü/','/Ý/','/à/','/á/','/â/','/ã/','/ä/','/å/','/ç/','/è/','/é/','/ê/','/ë/','/ì/','/í/','/î/','/ï/','/ð/','/ò/','/ó/','/ô/','/õ/','/ö/','/ù/','/ú/','/û/','/ü/','/ý/','/ÿ/', '/©/'];
        $clean = ['a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','o','o','o','o','o','u','u','u','u','y','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','o','o','o','o','o','o','u','u','u','u','y','y','copy'];

        $friendlyFilename = preg_replace($charNotClean, $clean, $filename);

        // After replacement, we destroy the last elements
        $friendlyFilename = utf8_decode($friendlyFilename);
        $friendlyFilename = preg_replace('/\?/', '', $friendlyFilename);

        $friendlyFilename = preg_replace('/[-\s]+/', '-', $friendlyFilename);

        // To lowercase
        $friendlyFilename = strtolower($friendlyFilename);
        return $friendlyFilename;
    }
}
