<!-- institution -->
<h3>Institutions</h3><br>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Institutions</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">New Institution</a>
    </li>
</ul>
<!-- nav tabs -->


<div class="tab-content" id="myTabContent">

    <!-- all funds -->
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div id="resultIns"></div>
    </div>

    <!-- new funds -->
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    
        <form id="storeInstit" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Institution Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Institution Name" name="name">
                {{ csrf_field() }}
                <small id="emailHelp" class="form-text text-muted">Enter the institution name above.</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

</div>
<!-- /tab content -->




<script type="text/javascript">

//store funds
$("#storeInstit").on("submit",function(e){
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "institutions/store",
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

var sPath = "http://localhost:8000/institutions/view";
$result = "";
$("#resultIns").empty();
$.getJSON(sPath, function(sdata){
    
    $.each( sdata, function( index, value ){
        result += ("<tr><td>"+ value.name +"</td><td>"+ value.created_at +"</td></tr>");
    });

    $("#resultIns").append( "<table class='table table-striped'><th><td>Name</td><td>Created Date</td></th> "+ result + "</table>");
})


</script>