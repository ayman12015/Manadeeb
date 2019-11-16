<?php	
include_once('../../includes/adoconn.php');
include_once('../../model/db.php');


	$SqlStr = "TRUNCATE TABLE dump_productcusperday";	
echo "Start TRUNCATE TABLE dump_productcusperday..." . "</br>";

if($res= db_query($SqlStr)){
echo "TABLE dump_productcusperday...Done" . "</br>";		
		
		
$SqlStr = "
INSERT INTO dump_productcusperday (prod_id,package_id,vendor_id,cust_id,ProductCunsumingPerDay,ProposedQuantities)
SELECT
p.prod_id,
pkg.package_id,
v.vendor_id,
c.cust_id,
sum(
(
  CASE WHEN
    (q.query_type=0)
  THEN 
  ( cb.ProdQty / (datediff(q.finish_date,cb.BillDate)))
  ELSE
  ( (cb.ProdQty - q.available_Qty) / (datediff(q.query_date,cb.BillDate)))
  END
))/count(*) AS 'ProductCunsumingPerDay',
(sum(
(
  CASE WHEN
    (q.query_type=0)
  THEN 
  ( cb.ProdQty / (datediff(q.finish_date,cb.BillDate)))
  ELSE
  ( (cb.ProdQty - q.available_Qty) / (datediff(q.query_date,cb.BillDate)))
  END
))/count(*) 
)*7 AS 'ProposedQuantities'

FROM
customers_bills_query q,
customers_bills cb,
shipping s,
productprice pp,
products p,
packages pkg,
vendors v,
customers c,
members m
WHERE
q.BillId=cb.BillId
AND cb.ShippingId=s.ShippingId
AND cb.cust_id=c.cust_id
AND s.priceId=pp.priceId
AND s.owner_id=m.id
AND pp.prod_id=p.prod_id
AND pp.package_id=pkg.package_id
AND p.vendor_id=v.vendor_id
Group by p.prod_id, pkg.package_id, v.vendor_id, c.cust_id	
";	

echo "Start Inserting Data in  dump_productcusperday..." . "</br>";
if($res= db_query($SqlStr)){
echo "Inserting Data in  dump_productcusperday...Done" . "</br>";
}
		
		


}
