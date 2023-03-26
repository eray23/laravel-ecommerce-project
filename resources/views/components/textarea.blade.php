<label for="{{$field}}" class="form-label">{{$label}}</label>
<textarea name="{{$field}}" id="{{$field}}" cols="20" rows="5" placeholder="{{$placeholder}}" class="form-control">{{old($field, $value)}}</textarea>
@error("$field")
<span class="text-danger">{{$message}}</span>
@enderror
