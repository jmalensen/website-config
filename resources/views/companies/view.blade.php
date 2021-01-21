@extends('layouts.app')
@section('pagetitle')@lang('companies.company')&nbsp;@endsection
@section('breadcrumbs')
	@include('layouts.inc.breadcrumbs', [
		'breadcrumbs' => [
			['name' => 'companies.companies', 'route' => 'companies.index'],
			['name' => 'companies.company'],
		]
		])
@endsection

@section('content')
	@if($company->trashed())
		<div class="alert alert-danger">
			@lang('companies.trashed')
		</div>
	@endif
	<div class="row">
		<div class="col-md-6">
			<div class="d-flex justify-content-between align-items-center mb-3">
				<h2 class="font-w300 mb-0">@lang('commun.informations')</h2>
				<div class="buttons">
					@can('edit', $company)
						<a href="{{route('companies.edit', ['company' => $company->id])}}"
						   class="btn btn-secondary btn-sm btn-rounded px-3">
							<i class="fa fa-edit mr-1"></i> @lang('commun.edit')
						</a>
					@endcan

					<a href="{{route('companies.index')}}"
					   class="btn btn-light btn-sm btn-rounded px-3">
						<i class="fa fa-arrow-circle-left mr-1"></i> @lang('commun.back')
					</a>
				</div>
			</div>
			<div class="block border-left border-3x border-primary">
				<div class="block-content  block-content-full">

				</div>
			</div>
		</div>
		<div class="col-md-6">
		</div>
	</div>


@endsection
