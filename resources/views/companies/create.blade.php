@extends('layouts.app')
@section('pagetitle')@lang('companies.add')@endsection
@section('breadcrumbs')
	@include('layouts.inc.breadcrumbs', [
		'breadcrumbs' => [
			['name' => 'companies.companies', 'route' => 'companies.index'],
			['name' => 'commun.add'],
		]
		])
@endsection

@section('content')
	@include('companies.form')
@endsection

