CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `prod_avalable`  AS  
SELECT 
p.prod_id,
p.prod_name,
p.manageable,
p.Descriptions,
p.vendor_id,
p.featured,
p.company_id,
pp.priceId,
pg.package_id,
pp.ProductPrice,
pp.ProductCost,
pp.PriceDate,
pg.package_name,
pg.package_abbreviation,
concat(p.prod_name," - " , pg.package_name) AS  "ProdNamePackage" FROM 
products p ,
productprice pp ,
packages pg  
where
    pp.del=0
    And pp.company_id='1'
    And pp.package_id=pg.package_id
    And pp.prod_id=p.prod_id
    And pp.CurrentPrice=1;