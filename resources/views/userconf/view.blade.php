@extends('layouts.front')
@section('pagetitle')@lang('commun.home')@endsection
@section('breadcrumbs')
	@include('layouts.inc.breadcrumbs', [
        'breadcrumbs' => [
        ]
        ])
@endsection

@section('content')
	<div class="row">
		<div class="col-12 col-md-6 offset-md-3">
			<h2>Récapitulatif</h2>

			@include('layouts.inc.saved_infos')
		</div>
	</div>


@endsection
