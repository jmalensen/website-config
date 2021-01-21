@if(!empty($company->id))
	{{ Form::model($company, ['route' => ['companies.update', $company->id], 'method' => 'post']) }}
	{{Form::hidden('id', null, ['value' => $company->id])}}
@else
	{{ Form::model($company, ['route' => 'companies.store']) }}
@endif
<div class="row" id="myvue">
	<div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">

		<div class="block border-left border-3x border-primary">
			<div class="block-content  block-content-full">
				{{Form::textGroup('country', __('companies.country'))}}
 
				{{Form::textGroup('social_reason', __('companies.social_reason'))}}
 
				{{Form::textGroup('address_line1', __('companies.address_line1'))}}
 
				{{Form::textGroup('address_line2', __('companies.address_line2'))}}
 
				{{Form::textGroup('zipcode', __('companies.zipcode'))}}
 
				{{Form::textGroup('city', __('companies.city'))}}
 
				{{Form::textGroup('local_address_line1', __('companies.local_address_line1'))}}
 
				{{Form::textGroup('local_address_line2', __('companies.local_address_line2'))}}
 
				{{Form::textGroup('local_zipcode', __('companies.local_zipcode'))}}
 
				{{Form::textGroup('local_city', __('companies.local_city'))}}
 
				{{Form::textGroup('phone', __('companies.phone'))}}
 
				{{Form::emailGroup('email', __('companies.email'))}}
 
				{{Form::textGroup('website', __('companies.website'))}}
 
				{{Form::textGroup('path_logo', __('companies.path_logo'))}}
 
				{{Form::textGroup('legal_form', __('companies.legal_form'))}}
 
				{{Form::textGroup('rcs_number', __('companies.rcs_number'))}}
 
				{{Form::textGroup('share_capital', __('companies.share_capital'))}}
 
				{{Form::textGroup('tva_intracom', __('companies.tva_intracom'))}}
 
				{{Form::textGroup('city_registration', __('companies.city_registration'))}}
 
				{{Form::textGroup('job_number', __('companies.job_number'))}}
 
				{{Form::textGroup('number_auth_establishment', __('companies.number_auth_establishment'))}}
 
				{{Form::textGroup('job_type', __('companies.job_type'))}}
 
				{{Form::textGroup('iban', __('companies.iban'))}}
 
				{{Form::textGroup('bic_swift', __('companies.bic_swift'))}}
 

			</div>

			<div class="block-content block-content-full block-content-sm bg-body-light text-right">
				{{ Form::cancelButton(route('companies.index')) }}
				{{ Form::submitButton() }}
			</div>
		</div>
	</div>
</div>
{{ Form::close() }}