import 'package:bask/fetches/fetch_favorite.dart';
import 'package:bask/models/product_subcategory_model.dart';
import 'package:flutter/material.dart';
import 'package:flutter_screenutil/flutter_screenutil.dart';
import 'package:provider/provider.dart';

import '../../provider/selectTabProvider.dart';
import '../widgets/appBar.dart';
import 'category/product.dart';


class Favorite extends StatefulWidget {
  @override
  _FavoriteState createState() => _FavoriteState();
}

class _FavoriteState extends State<Favorite> {

  late Future<ProductSubcategoryModel> futureProductSubcategory;

  @override
  void initState() {
    super.initState();
    futureProductSubcategory = fetchFavoriteGet(Provider.of<SelectTabProvider>(context,listen: false).userId);
  }
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AllAppBar(),
        backgroundColor: Colors.white,
        body: Padding(
    padding: const EdgeInsets.symmetric(horizontal: 16.0),
    child: Column(
          children: [
            ListTile(
              leading: Text('Избранные',
                  style: TextStyle(
                      color: Colors.black,
                      fontSize: 24.sp,
                      fontWeight: FontWeight.w400)),
            ),

            FutureBuilder<ProductSubcategoryModel>(future: futureProductSubcategory,builder: (context, snapshot)
            {
              if (snapshot.hasData &&
                  snapshot.connectionState == ConnectionState.done) {
                var items=snapshot.data!.data!.length;
                var short=snapshot.data!.data!;
                return Wrap(
                  runSpacing: 20,
                  spacing: 10,
                  children: [
                    for (var i=0;i<items;i++)
                      SlideContainer(short[i].image.toString(),short[i].name.toString(),short[i].description.toString(),short[i].price!,short[i].count!)
                  ],
                );


              } else if (snapshot.hasError) {
                return Text('${snapshot.error}');;
              }

              // By default, show a loading spinner.
              return Center(child: const CircularProgressIndicator());
            }
            )

          ],
        ))
    );
  }

  Widget SlideContainer(
      String image, String name,String description,int price,int count) {
    return GestureDetector(
      onTap: ()=>Navigator.of(context).push(MaterialPageRoute(builder:(context)=>Product(name: name,description: description,price: price,count: count,mainImage: image,))),
      child: Container(
        child: Row(
          children: [
            Container(
              width: 109.w,
              height: 109.h,
              decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(10),
                  border: Border.all(
                      width: 2.5.w, color: Color(0xFF929292).withOpacity(0.37)),
                  boxShadow: [
                    BoxShadow(
                        blurRadius: 7.r,
                        offset: Offset(0, 6),
                        color: Color(0x33000000))
                  ],
                  image: DecorationImage(
                      fit: BoxFit.cover,
                      image: NetworkImage(image))),
            ),
            SizedBox(width: 12.w),
            Expanded(
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Text(
                    name,
                    style: TextStyle(color: Color(0xFF313131), fontSize: 14.sp),
                  ),
                  SizedBox(height: 12.h),
                  Text(description,softWrap: true,
                    maxLines: 2,
                    overflow: TextOverflow.ellipsis,)
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}
