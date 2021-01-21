@extends('layouts.front')
@section('pagetitle')@lang('commun.home')@endsection

@section('content')
	<div class="row">
		<div class="col-12 col-md-6 offset-md-3">
			<div class="text-center">
				<h1>@lang('companies.welcome')</h1>
			</div>
		</div>
		<div class="col-12 text-center">
			<h2>@lang('companies.have_you_company_infos')</h2>
			<h3>@lang('companies.are_you_ready')</h3>
            <p>
				<a href="{{ route('userconf.registerCompany', ['step' => 1]) }}"
				   class="btn btn-choice-big">
					@lang('commun.yes')
				</a>
			</p>
			<div class="mb-2">
				<img src="{{ asset('images/logos/monstreko.png') }}" alt="Monstreko" style="width:300px">
			</div>
		</div>
	</div>
@endsection

@push('js_after')
	<script type="text/javascript">
		$(document).ready(function() {
		});
	</script>
@endpush