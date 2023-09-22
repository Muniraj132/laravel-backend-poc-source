@extends('layouts.app')
 
@section('title', 'Create Content')
 
@section('contents')

<div class="col-12">
  <div class="card recent-sales overflow-auto">
      <div class="card-body">
    <form  id="contentcreate">
        @csrf
        <label for="Content">Content</label>
        <textarea id="content" name="content"></textarea>
        <br/>
        <center>
          <button type="submit" class="btn btn-primary" id="submitbut">Save Content</button>
          <a href="/content" class="btn btn-secondary">Cancel </a>
          </center>
    </form>
    <br/>
  </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Validate js Files -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>


<script src="https://cdn.tiny.cloud/1/b52crnxs3soeu4s2fc2pop0wmq6rwy0gkrlx5djhwuaip52w/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
    });

  
    $('#submitbut').on('click',function(e) {
      e.preventDefault();
        var token = "{{ csrf_token() }}";
        var editor = tinymce.get("content");
        var content = editor.getContent();
        var data = {
          "_token": token,
          "content" : content
          };
          contentcreate(data);
       
    });
    function contentcreate(data){
        var data = data;
        $.ajax({
        url : "{{ Route('content.store')}}",
        method : "POST",
        data : data,
            success: function(response) {
              swal("Success!", "" + response.success + "", "success");
                   var newUrl = "{{ route('content.index') }}"; 
                   window.location.href = newUrl;
            }
        });
    }
  </script>


@endsection