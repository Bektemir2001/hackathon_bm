import 'package:bask/models/general_subcategory_model.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_rating_bar/flutter_rating_bar.dart';
import 'package:flutter_screenutil/flutter_screenutil.dart';
import 'package:provider/provider.dart';

import '../../../provider/selectTabProvider.dart';
import '../../auth/sing_in/sing_in_screen.dart';
import '../../widgets/appBar.dart';
import '../basket.dart';
import 'custom_navigation.dart';
import 'full_screen_album.dart';

class Product extends StatefulWidget {
  final name;
  final description;
  final price;
  final mainImage;
  final count;
  const Product({Key? key,required this.name,required this.description,required this.price,required this.mainImage,required this.count}) : super(key: key);

  @override
  _ProductState createState() => _ProductState();
}

class _ProductState extends State<Product> {
  String comment =
      '''Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua tempor incididunt ut labore et dolore ''';
  List<String> userComment = [
    'Азим Дженалиев',
  ];
  TextEditingController countField=TextEditingController();
  var lastCount=0;
  @override
  Widget build(BuildContext context) {
    String aboutUs =
        widget.description;
    return Scaffold(
      appBar: AllAppBar(),
      body: ListView(
        padding: EdgeInsets.symmetric(horizontal: 14).r,
        children: [
          Row(
            children: [
              Container(
                width: 142.w,
                height: 142.h,
                padding: EdgeInsets.all(9).r,
                decoration: BoxDecoration(
                    shape: BoxShape.circle,
                    color: Colors.white,
                    boxShadow: [
                      BoxShadow(
                          blurRadius: 5,
                          offset: Offset(0, 0),
                          color: Color(0x26000000))
                    ]),
                child: Container(
                  padding: EdgeInsets.all(9).r,
                  decoration: BoxDecoration(
                      shape: BoxShape.circle,
                      color: Colors.white,
                      boxShadow: [
                        BoxShadow(
                            blurRadius: 5,
                            offset: Offset(0, 0),
                            color: Color(0x26000000))
                      ]),
                  child: Stack(
                    //overflow: Overflow.visible,
                    children: [
                      Container(
                        padding: EdgeInsets.all(8).r,
                        decoration: BoxDecoration(
                          // color: Colors.white,
                          shape: BoxShape.circle,
                          border: Border.all(
                              width: 0.5.w,
                              color: Color(0xFF929292).withOpacity(0.37)),
                          boxShadow: [
                            BoxShadow(
                                blurRadius: 16,
                                offset: Offset(0, 0),
                                color: Color(0x33000000))
                          ],
                          image: DecorationImage(
                              fit: BoxFit.cover,
                              image: NetworkImage(widget.mainImage)),
                        ),
                      ),
                    ],
                  ),
                ),
              ),
              SizedBox(width: 15),
              Expanded(
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      widget.name,
                      style: TextStyle(
                        color: Color(0xFF313131),
                        fontSize: 20.sp,
                        fontWeight: FontWeight.w400,
                      ),
                    ),
                    SizedBox(height: 17.h),
                    Text(
                      widget.price.toString()+' сом',
                      style: TextStyle(
                        color: Color(0xFF313131),
                        fontSize: 24.sp,
                        fontWeight: FontWeight.w400,
                      ),
                    ),
                  ],
                ),
              ),
            ],
          ),
          SizedBox(height: 48.h),
          Text(
            'Описание',
            style: TextStyle(
              color: Colors.black,
              fontSize: 20,
              fontWeight: FontWeight.w400,
            ),
          ),
          SizedBox(height: 10.h),
          Text(
            aboutUs,
            style: TextStyle(
              color: Color(0xFF515151),
              fontSize: 14.sp,
            ),
          ),
          SizedBox(height: 30.h),
          GestureDetector(
            onTap: (){
              print(Provider.of<SelectTabProvider>(context,listen: false).auth);
              if(int.parse(countField.text)<=lastCount){
                if(Provider.of<SelectTabProvider>(context,listen: false).auth)
                  Navigator.of(context).push(MaterialPageRoute(builder:(context)=>Basket()));
                else{
                  Navigator.of(context).push(MaterialPageRoute(builder:(context)=>SingInScreen()));
                }
              }

            },
            child: Padding(
              padding: const EdgeInsets.symmetric(horizontal: 120.0).r,
              child: Container(
                  height: 45.h,
                  decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(10).r,
                    color: Color(0xFFFF6B00),
                  ),
                  child: Row(
                    children: [
                      Expanded(
                        flex: 1,
                        child: Icon(Icons.shopping_bag_outlined,size: 20.sp,color: Colors.white,)
                        /*Image.asset(
                          'assets/img/category_page/homeIcon.png',
                          width: 15,
                          height: 15,
                        ),*/
                      ),
                      Expanded(
                        flex: 2,
                        child: Text(
                          'В корзину',
                          style: TextStyle(color: Colors.white, fontSize: 14.sp),
                        ),
                      ),
                    ],
                  )),
            ),
          ),
          SizedBox(height: 30.h),

          SizedBox(height: 13.h),
          SizedBox(height: 69.h),
          Text(
            'Отзывы',
            style: TextStyle(
              color: Colors.black,
              fontSize: 20.sp,
            ),
          ),
          SizedBox(height: 21.h),
          Container(
            height: 350.h,
            child: ListView.separated(
              physics: NeverScrollableScrollPhysics(),
              itemCount: userComment.length,
              separatorBuilder: (context, index) => SizedBox(height: 20.h),
              itemBuilder: (BuildContext context, int index) => Row(
                crossAxisAlignment: CrossAxisAlignment.start,
                mainAxisAlignment: MainAxisAlignment.start,
                children: [
                  Container(
                    width: 25.w,
                    height: 25.h,
                    decoration: BoxDecoration(
                        shape: BoxShape.circle,
                        image: DecorationImage(
                            image: AssetImage(
                                'assets/img/category_page/comment/$index.png'))),
                  ),
                  SizedBox(width: 11.w),
                  Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(userComment[index],
                          style: TextStyle(color: Colors.black, fontSize: 12.sp)),
                      SizedBox(height: 10.h),
                      Container(
                        width: 276.w,
                        child: Text(
                          comment,
                          style: TextStyle(color: Colors.black, fontSize: 10.sp),
                        ),
                      ),
                      SizedBox(height: 8.h),
                      RatingBar.builder(
                          ignoreGestures: true,
                          allowHalfRating: true,
                          initialRating: 4.5,
                          itemSize: 12.sp,
                          itemBuilder: (context, _) => Icon(
                                Icons.star,
                                color: Color(0xFFFF0707),
                              ),
                          onRatingUpdate: (rating) {
                            setState(() {});
                          }),
                      SizedBox(height: 5.h),
                      Row(
                        children: [
                          Text('10:56',
                              style: TextStyle(
                                  color: Color(0xFF8d8d8d), fontSize: 10.sp)),
                          SizedBox(width: 19.w),
                          Text('19.10.20',
                              style: TextStyle(
                                  color: Color(0xFF8d8d8d), fontSize: 10.sp))
                        ],
                      ),
                    ],
                  )
                ],
              ),
            ),
          ),
          SizedBox(height: 26.h),
          Padding(
            padding: const EdgeInsets.symmetric(horizontal: 10.0).r,
            child: Divider(
              thickness: 1.1,
              color: Color(0xFFdbdbdb),
            ),
          ),
          SizedBox(height: 20.h),
          Text('Поставить рейтинг и оставить отзыв',style: TextStyle(color: Color(0xFF515151),fontSize: 14),textAlign: TextAlign.center),
          SizedBox(height: 17.h),
          Center(
            child: RatingBar.builder(
                initialRating: 1,
                itemSize: 19,
                itemBuilder: (context, _) => Icon(
                  Icons.star,
                  color: Color(0xFFFF6B00),
                ),
                onRatingUpdate: (rating) {
                  setState(() {});
                }),
          ),
          SizedBox(height: 34.h),
          Padding(
            padding: const EdgeInsets.symmetric(horizontal: 35.0).r,
            child: Container(
              padding: EdgeInsets.symmetric(horizontal: 15),
              height: 78.h,
              decoration: BoxDecoration(
                color: Colors.white,
                borderRadius: BorderRadius.circular(10).h,
                border: Border.all(width: 0.5,color: Color(0xff929292).withOpacity(0.37)),
                boxShadow: [
                  BoxShadow(
                    color: Color(0x1A000000),
                    blurRadius: 4,
                    offset: Offset(0,4)
                  )
                ]
              ),
              child: TextFormField(
                decoration: InputDecoration(
                  border: InputBorder.none,
                  hintText: 'Отзыв',
                  hintStyle: TextStyle(color: Color(0xFFAFAFAF),fontSize: 14.sp)
                ),
              ),
            ),
          ),
          SizedBox(height: 20.h),
          Padding(
            padding: const EdgeInsets.symmetric(horizontal: 110.0).r,
            child: Container(
              width: 140.w,
              height: 40.h,
              decoration: BoxDecoration(
                color: Color(0xFFFF6B00),
                borderRadius: BorderRadius.circular(10).r,
              ),
              child: Center(child: Text('Отправить',style: TextStyle(color: Colors.white,fontSize: 14.sp),)),
            ),
          ),
          SizedBox(height: 100.h),
        ],
      ),
    );
  }

  Widget infoWidget(String icon, String text) {
    return Expanded(
      child: Container(
        width: 145.w,
        child: Row(
          children: [
            Image.asset(
              'assets/img/category_page/infoIcons/${icon}Icon.png',
              width: 19.w,
              height: 19.h,
            ),
            SizedBox(width: 4.w),
            Text(
              text,
              style: TextStyle(
                color: Color(0xFF313131),
                fontSize: 11.sp,
              ),
            ),
          ],
        ),
      ),
    );
  }
}
