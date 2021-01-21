@extends('layouts.front')
@section('pagetitle')@lang('commun.registration_company')@endsection

@section('content')
	<div class="row" id="mystepvuejs">
		<mainappuserconf/>
	</div>
@endsection

@push('js_after')
	<script type="text/javascript">
		window.auth_user = {!! json_encode($authUser) !!};
		$(document).ready(function() {
		});
	</script>
	<script type="text/javascript" src="{{ mix('js/jquery.validate.js') }}"></script>
	<script type="text/javascript" src="{{ mix('js/select2.min.js') }}"></script>
	<link rel="stylesheet" href="{{ mix('css/select2.min.css') }}">

	<script type="text/javascript" src="{{ mix('js/ion.rangeSlider.js') }}"></script>
	<link rel="stylesheet" href="{{ mix('css/ion.rangeSlider.css') }}">

	<script type="text/javascript" src="{{ mix('js/init-step.js') }}"></script>
@endpush
