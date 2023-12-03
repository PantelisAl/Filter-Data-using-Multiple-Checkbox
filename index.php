<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Filter Data using Multiple Checkbox in php</h4>
                    </div>
                </div>
            </div>

            <!-- Brand List  -->
            <div class="col-md-3">
                <form action="" method="GET">
                    <div class="card shadow mt-3">
                        <div class="card-header">
                            <h5>Filter 
                                <button type="submit" class="btn btn-primary btn-sm float-end">Search</button>
                            </h5>
                        </div>
                        <div class="card-body">
                            <h6>Brand List</h6>
                            <hr>
                            <?php
                              $con = mysqli_connect("localhost","root","123456","filter_search");
                              
                              $brand_query = "SELECT *
                                              FROM brands";

                              $brand_query_result = mysqli_query($con,$brand_query);

                              if(!empty($brand_query_result)){

                                 foreach($brand_query_result as $brandlist){

                                    $checked = [];
                                    if(isset($_GET['brands']))
                                    {
                                        $checked = $_GET['brands'];
                                    }   
                                   ?>  
                                  <div>
                                      <input type="checkbox" name="brands[]" value ="<?= $brandlist['id']; ?>" <?php if(in_array($brandlist['id'],$checked)){echo "checked";} ?>/>
                                      <?= $brandlist['name']?>
                                  </div>
                                
                                <?php
                                }

                              }else{
                                 echo "No Brands Found";
                              }  

                            ?>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Brand Items - Products -->
            <div class="col-md-9 mt-3">
                <div class="card ">
                    <div class="card-body row">
                        <?php
                           if(isset($_GET['brands'])){
                               
                              $branchecked = [];
                              $branchecked = $_GET['brands'];

                              foreach($branchecked as $rowbrand){

                                  $products = "SELECT *
                                               FROM products
                                               WHERE brand_id IN ($rowbrand)";
                                               $products_query = mysqli_query($con,$products);

                                  if(!empty($products_query)){
                                     foreach($products_query as $product_item):
                                        ?>
                                           <div class="col-md-4 mt-3">
                                               <div class="border p-2">
                                                    <h6><?= $product_item['name']?></h6>
                                               </div>
                                           </div>
                                        <?php
                                     endforeach;
                                  }

                              }

                           }else{
                              $products = "SELECT *
                                           FROM products";
                                           $products_query =mysqli_query($con,$products);

                             if(!empty($products_query)){
                                foreach($products_query as $product_item):
                                ?>
                                    <div class="col-md-4 mt-3">
                                            <div class="border p-2">
                                                <h6><?=$product_item['name']?></h6>
                                            </div>
                                    </div>
                                <?php
                                endforeach;
                             }else{
                                echo "No Items Found";
                             }              
                           }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>