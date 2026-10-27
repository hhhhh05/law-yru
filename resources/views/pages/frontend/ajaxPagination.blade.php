@extends('pages.frontend.home')

{{-- Content --}}
@section('content')
    <input type="text"  class="form-control"  placeholder="ค้นหา..."  id="search" >
            <div class="card-body" id="tag_container">
                   @include('pages.frontend.presult')
            </div>

    <div class="modal fade" id="mainpopup" tabindex="-1" role="dialog" aria-labelledby="mainpopupLabel" aria-hidden="true"  data-close="10" data-open="2" data-href="https://www.anitur.com.tr/popup/test-6-text">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <div class="modal-body">
                    <img src="{{asset('media/logos/new_year.jpg') }}" class="modal-content" id="modal-img-1" alt="">
                </div>

                <div class="modal-footer">
                    <span class="will-close">ปิดอีก : <strong>n</strong> วินาที</span>
                    <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal" >ปิดหน้าต่าง
                    </button>
                </div>

            </div>
        </div>
    </div>



@endsection

@section('scripts')


<script type="text/javascript">
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                getData(page);
            }
        }
    });

    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();

            $('li').removeClass('active');
            $(this).parent('li').addClass('active');

            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            console.log(myurl);
            console.log('page');
            console.log(page);

            getData(page);
        });

        $( "#search" ).keyup(function(){
            var search= $(this).val();

           getData(1,search);
        });


    });

    function getData(page,search=""){
        $.ajax(
        {
            url: '?page=' + page +'&keyword='+search,
            type: "get",
            datatype: "html"
        }).done(function(data){
            $("#tag_container").empty().html(data);
            location.hash = page;
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }


    $("#Search").on("keyup", function () {
        val = $(this).val().toLowerCase();
        $('tr').each(function () {
            $(this).toggle($(this).text().toLowerCase().includes(val));
        });
    });


</script>



@endsection


