<label for="{{$field}}" class="form-label">{{$label}}</label>
<input type="{{$type}}" class="form-control" id="{{$field}}" name="{{$field}}" placeholder="{{$placeholder}}" value="{{old($field, $value)}}">
@error($field)
<span class="text-danger">{{$message}}</span>
@enderror
