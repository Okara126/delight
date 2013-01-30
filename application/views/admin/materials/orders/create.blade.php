@layout('layout.admin')

@section('title')
{{ __('materials.order') }}
@endsection

@section('js')
	@parent
	<script>
		$(function() {

		})
	</script>
@endsection

@section('content')
<div id="admin-materials-order">
	<h1>{{ __('materials.order') }}</h1>	
	<hr>    
	{{ Form::open('admin/materials/order/create') }}
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="span1 center"><input type="checkbox" id="select-all" checked></th>
					<th class="span1 center">#</th>
					<th class="left">{{ __('admin.name') }}</th>
					<th class="span2 right">{{ __('materials.quantity') }}</th>
					<th class="span1 center">{{ __('admin.unit') }}</th>
					<th class="span2 left">{{ __('suppliers.suppliers') }}</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($query as $data)
				<tr>
					<th class="center"><input type="checkbox" name="selected_id[]" value="{{ $data->id }}" checked></th>
					<td class="center">{{ $data->id }}</td>
					<td class="left">{{ $data->name }}</td> 
					<td class="right">
						<input type="text" name="quantity[{{ $data->id }}]" value="<?php
							echo ($data->max_stock - $data->total > 0) ? ($data->max_stock - $data->total) : 0;
						?>" class="right" required pattern="^[0-9]+$" title="Number only"></td>
					<td class="center">{{ $data->unit }}</td>
					<td class="left">
						<select id="inputSuppliers" name="suppliers[]" required>
							<option value="" disabled selected>Choose...</option>
							@foreach ($data->suppliers as $supplier)
								<option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
							@endforeach
						</select>
					</td> 
				</tr>
				@empty
				<tr><td colspan="5" class="center">{{ __('admin.message_no_result') }}</td></tr>
				@endforelse
			</tbody>
		</table>
		<div class="center">
			<button class="btn btn-large btn-primary">Create Material Order</button>
		</div>
	{{ Form::close() }}
</div>
@endsection