<?require_once('header.php');?>
<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-body"><!-- Add rows table -->


<!-- Individual column searching (text inputs) table -->
<section id="text-inputs">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Listed Funding For investor</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        </p>
                        <table class="table table-striped table-bordered text-inputs-searching">
                            <thead>
                                <tr>
                                    <th>Expected Funding</th>
                                    <th>Bid Amount</th>
                                    <th>Minimum Share</th>
                                    <th>Maximum Share</th>
                                    <th>Start date</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?foreach($members as $key){?>
                                    <tr>
                                        <td><?=$key['expected_funding'];?></td>
                                        <td><?=$key['bid_amount'];?></td>
                                        <td><?=$key['min_share'];?></td>
                                        <td><?=$key['max_share'];?></td>
                                        <td><?=$key['bid_dt'];?></td>
                                        <td><?=$key['expiry_dt'];?></td>
                                    </tr>
                                <?}?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Expected Funding</th>
                                    <th>Bid Amount</th>
                                    <th>Minimum Share</th>
                                    <th>Maximum Share</th>
                                    <th>Start date</th>
                                    <th>End Date</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Individual column searching (text inputs) table -->

        </div>
      </div>
    </div>
    
  </body>
</html>

<?require_once('footer.php');?>