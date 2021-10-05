@props(['message'=>$message])
<div class="materialert danger">
    <i class="material-icons">warning</i> <span>{{$message}}</span>
    <button type="button" class="waves-effect close-alert"><i class="material-icons">close</i></button>
</div>