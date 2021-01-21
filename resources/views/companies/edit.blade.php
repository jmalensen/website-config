@extends('layouts.app')
@section('pagetitle')@lang('companies.edit')@endsection
@section('breadcrumbs')
	@include('layouts.inc.breadcrumbs', [
		'breadcrumbs' => [
			['name' => 'companies.companies', 'route' => 'companies.index'],
			['name' => 'commun.edit'],
		]
		])
@endsection

@section('content')
	@include('companies.form')
@endsection

