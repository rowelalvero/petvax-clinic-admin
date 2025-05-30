@if($data->status != 'completed' && $data->status != 'cancelled' ) 
<select name="branch_for" class="select2 change-select" data-token="{{csrf_token()}}" data-url="{{route('backend.bookings.updateStatus', ['id' => $data->id, 'action_type' => 'update-status'])}}" style="width: 100%;">
  @foreach ($booking_status as $key => $value )
 
    <option value="{{$value->name}}" {{$data->status == $value->name ? 'selected' : ''}} >{{$value->value}}</option>
  @endforeach
</select>
@elseif($data->status === 'cancelled')
    <span class="text-capitalize badge bg-soft-danger p-3"> {{ $data->status }}</span>
    
@else

<span class="text-capitalize badge bg-soft-success p-3"> {{ $data->status }}</span>
@endif
