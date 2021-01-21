@if(!empty($company->country))
    <p class="m-0">Pays de l'entreprise : {{ $company->country }}</p>
@endif

@if(!empty($company->eko_usage_id))
    <p>Formule Eko : {{ data_get($company, 'ekoUsage.eko_type') }}</p>
@endif

@if(!empty($company->social_reason))
    <p class="m-0">@lang('companies.social_reason') : {{ $company->social_reason }}</p>
@endif

@if(!empty($company->address_line1))
    <p class="m-0">@lang('companies.address_line1') : {{ $company->address_line1 }}</p>
@endif
@if(!empty($company->address_line2))
    <p class="m-0">@lang('companies.address_line2') : {{ $company->address_line2 }}</p>
@endif
@if(!empty($company->zipcode))
    <p class="m-0">@lang('companies.zipcode') : {{ $company->zipcode }}</p>
@endif
@if(!empty($company->city))
    <p>@lang('companies.city') : {{ $company->city }}</p>
@endif

@if(!empty($company->local_address_line1))
    <p class="m-0">@lang('companies.local_address_line1') : {{ $company->local_address_line1 }}</p>
@endif
@if(!empty($company->local_address_line2))
    <p class="m-0">@lang('companies.local_address_line2') : {{ $company->local_address_line2 }}</p>
@endif
@if(!empty($company->local_zipcode))
    <p class="m-0">@lang('companies.local_zipcode') : {{ $company->local_zipcode }}</p>
@endif
@if(!empty($company->local_city))
    <p class="m-0">@lang('companies.local_city') : {{ $company->local_city }}</p>
@endif

@if(!empty($company->phone))
    <p class="m-0">@lang('companies.phone') : {{ $company->phone }}</p>
@endif
@if(!empty($company->email))
    <p>@lang('companies.email') : {{ $company->email }}</p>
@endif

@if(!empty($company->website))
    <p>@lang('companies.website') : {{ $company->website }}</p>
@endif


@if(!empty($company->legal_form))
    <p class="m-0">@lang('companies.legal_form') : {{ $company->legal_form }}</p>
@endif

@if(!empty($company->rcs_number))
    <p class="m-0">@lang('companies.rcs_number') : {{ $company->rcs_number }}</p>
@endif

@if(!empty($company->share_capital))
    <p class="m-0">@lang('companies.share_capital') : {{ $company->share_capital }}</p>
@endif

@if(!empty($company->tva_intracom))
    <p class="m-0">@lang('companies.tva_intracom') : {{ $company->tva_intracom }}</p>
@endif

@if(!empty($company->city_registration))
    <p class="m-0">@lang('companies.city_registration') : {{ $company->city_registration }}</p>
@endif

@if(!empty($company->job_number))
    <p class="m-0">@lang('companies.job_number') : {{ $company->job_number }}</p>
@endif

@if(!empty($company->number_auth_establishment))
    <p class="m-0">@lang('companies.number_auth_establishment') : {{ $company->number_auth_establishment }}</p>
@endif

@if(!empty($company->job_type))
    <p class="m-0">@lang('companies.job_type') : {{ $company->job_type }}</p>
@endif

@if(!empty($company->iban))
    <p class="m-0">@lang('companies.iban') : {{ $company->iban }}</p>
@endif

@if(!empty($company->bic_swift))
    <p class="m-0">@lang('companies.bic_swift') : {{ $company->bic_swift }}</p>
@endif

@if(!empty($company->ekoUsage))
    @if(!empty($company->ekoUsage->customer_type))
        <p class="m-0">@lang('eko_usages.customer_type') : {{ $company->ekoUsage->customer_type }}</p>
    @endif

    @if(!empty($company->ekoUsage->need_billing))
        <p class="m-0">@lang('eko_usages.need_billing') : {{ $company->ekoUsage->need_billing }}</p>
    @endif

    @if(!empty($company->ekoUsage->selling_type))
        <p class="m-0">@lang('eko_usages.selling_type') : {{ $company->ekoUsage->selling_type }}</p>
    @endif

    @if(!empty($company->ekoUsage->need_library))
        <p class="m-0">@lang('eko_usages.need_library') : {{ $company->ekoUsage->need_library }}</p>
    @endif

    @if(!empty($company->ekoUsage->need_stock))
        <p class="m-0">@lang('eko_usages.need_stock') : {{ $company->ekoUsage->need_stock }}</p>
    @endif

    @if(!empty($company->ekoUsage->need_providers))
        <p class="m-0">@lang('eko_usages.need_providers') : {{ $company->ekoUsage->need_providers }}</p>
    @endif

    @if(!empty($company->ekoUsage->need_follow_orders_providers))
        <p class="m-0">@lang('eko_usages.need_follow_orders_providers') : {{ $company->ekoUsage->need_follow_orders_providers }}</p>
    @endif

    @if(!empty($company->ekoUsage->store_history_customers))
        <p class="m-0">@lang('eko_usages.store_history_customers') : {{ $company->ekoUsage->store_history_customers }}</p>
    @endif

    @if(!empty($company->ekoUsage->store_important_files))
        <p class="m-0">@lang('eko_usages.store_important_files') : {{ $company->ekoUsage->store_important_files }}</p>
    @endif

    @if(!empty($company->ekoUsage->export_sales_logs))
        <p class="m-0">@lang('eko_usages.export_sales_logs') : {{ $company->ekoUsage->export_sales_logs }}</p>
    @endif

    @if(!empty($company->ekoUsage->contracts_services))
        <p class="m-0">@lang('eko_usages.contracts_services') : {{ $company->ekoUsage->contracts_services }}</p>
    @endif
@endif