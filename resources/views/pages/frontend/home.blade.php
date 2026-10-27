<!DOCTYPE html>
<html>
@include('pages.frontend.layout.head')
<body>
@include('pages.frontend.layout.header')

<div class="container-fluid page-wide mt-4 mb-4">
    <div class="row">
        @include('pages.frontend.layout.aside')
        <div class="col-lg-9 col-md-8 main-col">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-title">
                        <h2>{{$page_title}}</h2>
                    </div><br>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</div>

@yield('scripts')




@include('pages.frontend.layout.footer')



</div>

</body>
</html>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );

$(document).ready(function(){
 $('#search').keyup(function(){

  // Search text
  var text = $(this).val();

  // Hide all content class element
  $('.content').hide();

  // Search and show
  $('.content:contains("'+text+'")').show();

 });
});
</script>


