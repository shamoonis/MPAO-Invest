
<h3>Funds</h3><br>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Funds</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">New Fund</a>
    </li>
</ul>
<!-- nav tabs -->


<div class="tab-content" id="myTabContent">

    <!-- all funds -->
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div id="result"></div>
    </div>

    <!-- new funds -->
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    
        <form id="storeFunds" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Fund Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Fund Name" name="name">
                {{ csrf_field() }}
                <small id="emailHelp" class="form-text text-muted">Enter the fund name above.</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

</div>
<!-- /tab content -->




<script type="text/javascript">

//store funds
$("#storeFunds").on("submit",function(e){
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "funds/store",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            //data: $("#postForm").serialize(),
            success: function (d) {
              $('#msg').html('<div class="alert alert-success">Success.</div>');
            },
            error: function () {
              $('#msg').html('<p>Error.</p>');
        }

        })
        
    })//submit
//


//get funds
$("#result").empty();
var sPath = "http://localhost:8000/funds/view";
$result = "";
$.getJSON(sPath, function(sdata){
    $.each( sdata, function( index, value ){
        result += ("<tr><td>"+ value.name +"</td><td>"+ value.created_at +"</td></tr>");
    });

    $("#result").append( "<table class='table table-striped'><th><td>Name</td><td>Created Date</td></th> "+ result + "</table>");
})


</script>