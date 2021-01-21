@extends('layouts.app')
@section('pagetitle')@lang('companies.index')@endsection

@section('content')
	<div class="block">
		<div class="block-content block-content-full border-left border-3x border-primary">
			@can('create', \App\Models\Company::class)
				<a href="{{route('companies.create')}}"
				   class="btn btn-hero-sm btn-hero-info float-right">
					<i class="fa fa-plus"></i> @lang('commun.add')
				</a>
				<div class="clearfix mb-2"></div>
			@endcan
			<div class="row">
				<div class="col-md-12">
					{{Form::open(['method' => 'GET'])}}
					{{Form::considerRequest(true)}}
					{{Form::searchGroup('search')}}
					{{Form::close()}}
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead class="thead-light">
					    <tr>
					<th class="text-capitalize">@lang("companies.country")</th> 
					<th class="text-capitalize">@lang("companies.social_reason")</th> 
					<th class="text-capitalize">@lang("companies.address_line1")</th> 
					<th class="text-capitalize">@lang("companies.address_line2")</th> 
					<th class="text-capitalize">@lang("companies.zipcode")</th> 
					<th class="text-capitalize">@lang("companies.city")</th> 
					<th class="text-capitalize">@lang("companies.local_address_line1")</th> 
					<th class="text-capitalize">@lang("companies.local_address_line2")</th> 
					<th class="text-capitalize">@lang("companies.local_zipcode")</th> 
					<th class="text-capitalize">@lang("companies.local_city")</th> 
					<th class="text-capitalize">@lang("companies.phone")</th> 
					<th class="text-capitalize">@lang("companies.email")</th> 
					<th class="text-capitalize">@lang("companies.website")</th> 
					<th class="text-capitalize">@lang("companies.path_logo")</th> 
					<th class="text-capitalize">@lang("companies.legal_form")</th> 
					<th class="text-capitalize">@lang("companies.rcs_number")</th> 
					<th class="text-capitalize">@lang("companies.share_capital")</th> 
					<th class="text-capitalize">@lang("companies.tva_intracom")</th> 
					<th class="text-capitalize">@lang("companies.city_registration")</th> 
					<th class="text-capitalize">@lang("companies.job_number")</th> 
					<th class="text-capitalize">@lang("companies.number_auth_establishment")</th> 
					<th class="text-capitalize">@lang("companies.job_type")</th> 
					<th class="text-capitalize">@lang("companies.iban")</th> 
					<th class="text-capitalize">@lang("companies.bic_swift")</th> 

					    <th width="150px;"></th>
					    </tr>
					</thead>

					<tbody>
					@foreach($companies as $company)
						<tr>
						<td>{{ $company->country }}</td> 
						<td>{{ $company->social_reason }}</td> 
						<td>{{ $company->address_line1 }}</td> 
						<td>{{ $company->address_line2 }}</td> 
						<td>{{ $company->zipcode }}</td> 
						<td>{{ $company->city }}</td> 
						<td>{{ $company->local_address_line1 }}</td> 
						<td>{{ $company->local_address_line2 }}</td> 
						<td>{{ $company->local_zipcode }}</td> 
						<td>{{ $company->local_city }}</td> 
						<td>{{ $company->phone }}</td> 
						<td>{{Helpers::linkEmail($company->email)}}</td> 
						<td>{{ $company->website }}</td> 
						<td>{{ $company->path_logo }}</td> 
						<td>{{ $company->legal_form }}</td> 
						<td>{{ $company->rcs_number }}</td> 
						<td>{{ $company->share_capital }}</td> 
						<td>{{ $company->tva_intracom }}</td> 
						<td>{{ $company->city_registration }}</td> 
						<td>{{ $company->job_number }}</td> 
						<td>{{ $company->number_auth_establishment }}</td> 
						<td>{{ $company->job_type }}</td> 
						<td>{{ $company->iban }}</td> 
						<td>{{ $company->bic_swift }}</td> 

							<td>
								@can('edit', $company)
									<a title="@lang('commun.edit')"
									   href="{{ route('companies.edit', ['company' => $company->id]) }}"
									   class="btn btn-hero-sm btn-hero-primary" data-toggle="tooltip">
										<i class="fa fa-edit"></i>
									</a>
								@endcan
								@can('delete', $company)
									<a title="@lang('commun.delete')"
									   href="{{ route('companies.delete', ['company' => $company->id]) }}" data-delete=""
									   data-message="" class="btn btn-hero-sm btn-hero-danger" data-toggle="tooltip">
										<i class="fa fa-trash"></i>
									</a>
								@endcan
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
				{{ $companies->appends(\Request::except('page'))->render() }}
		</div>
	</div>

@endsection