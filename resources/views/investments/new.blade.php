
<h3>Investments</h3><br>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Types</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">New Type</a>
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
    
        <form id="storeInvestments" enctype="multipart/form-data">
        <br>
        <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label>Fund</label>
                <select class="form-control" name="funds_id">
                    @foreach($fund as $fn)
                    <option value="{{ $fn->id }}">{{ $fn->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Institution</label>
                <select class="form-control" name="institutions_id">
                    @foreach($inst as $in)
                    <option value="{{ $in->id }}">{{ $in->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Type</label>
                <select class="form-control" name="types_id">
                    @foreach($type as $ty)
                    <option value="{{ $in->id }}">{{ $ty->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-md-9">
            <div class="form-group">
                <label>Reference</label>
                <input type="text" class="form-control" name="reference">
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label>Purchase Price</label>
                <input type="text" class="form-control" name="purchasePrice">
            </div>
        </div>

        <div class="col-md-6">
            <label>Rate/Ratio</label>
            <input type="text" class="form-control" name="rate">
        </div>


        <div class="col-md-6">
            <label>Maturity (Days)</label>
            <input type="text" class="form-control" name="maturityDays">
        </div>


         {{ csrf_field() }}
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Save</button>

        </form>

    </div>

</div>
<!-- /tab content -->




<script type="text/javascript">

//store funds
$("#storeInvestments").on("submit",function(e){
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "investments/store",
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
var sPath = "http://localhost:8000/investments/view";
$result = "";
$.getJSON(sPath, function(sdata){
    $.each( sdata, function( index, value ){
        result += "<tr>" +
                        "<td>" + value.date + "</td>" +
                        "<td>"+ value.funds_id +"</td>" +
                        "<td>"+ value.institutions_id +"</td>" +
                        "<td>"+ value.types_id +"</td>" +
                        "<td>"+ value.reference +"</td>" +
                        "<td>"+ value.purchasePrice +"</td>" +
                        "<td>"+ value.rate +"</td>" +
                        "<td>"+ value.maturityDays +"</td>" +
                    "</tr>"
                  
    });

    $("#result").append( "<table class='table table-striped'>" +
                         "<tr>" + 
                            "<td>Date</td>" +
                            "<td>Fund</td>" +
                            "<td>Institution</td>" +
                            "<td>Type</td>" +
                            "<td>Reference</td>" +
                            "<td>Price</td>" +
                            "<td>Rate</td>" +
                            "<td>Maturity</td>" +
                         "</tr>"+ 
                            result + 
                         "</table>");
})


</script>