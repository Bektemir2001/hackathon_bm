import 'package:bask/views/pages/category/selectCategoty.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../../../provider/selectCatProvider.dart';

class Filter extends StatefulWidget {
  final String category;
  const Filter({Key? key,required this.category}) : super(key: key);

  @override
  _FilterState createState() => _FilterState();
}

class _FilterState extends State<Filter> {

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          iconTheme: IconThemeData(
            color: Color(0xFF225196), //change your color here
          ),
          elevation: 0,
          backgroundColor: Colors.white,
          actions: [
            IconButton(
              onPressed: () {},
              icon: Icon(
                Icons.search,
                color: Color(0xFF225196),
              ),
            ),
          ],
        ),
        backgroundColor: Colors.white,
        body: ListView(
          padding: EdgeInsets.symmetric(horizontal: 14),
          children: [
            ListTile(
              leading: Text('Фильтры',
                  style: TextStyle(
                      color: Colors.black,
                      fontSize: 24,
                      fontWeight: FontWeight.w400)),
            ),
            SizedBox(height: 20),
            Text(
              'Категория',
              style: TextStyle(color: Color(0xFF313131), fontSize: 20),
            ),
            SizedBox(height: 10),
            GestureDetector(
              onTap: ()=>Navigator.of(context).push(MaterialPageRoute(builder:(context)=>SelectCategory())),
              child: Container(
                  padding: EdgeInsets.symmetric(horizontal: 19),
                  height: 45,
                  decoration: BoxDecoration(
                    border: Border.all(width: 1, color: Color(0xFF225196)),
                    borderRadius: BorderRadius.circular(10),
                  ),
                  child: Column(
                    mainAxisAlignment: MainAxisAlignment.center,
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Provider.of<SelectCatProvider>(context).category==''?
                      Text('Выберите категорию',
                          style: TextStyle(
                            color: Color(0xFFA6A6A6),
                            fontSize: 16,
                            fontWeight: FontWeight.w400,
                          )):
                      Text(Provider.of<SelectCatProvider>(context).category,
                          style: TextStyle(
                            color: Color(0xFF225196),
                            fontSize: 16,
                            fontWeight: FontWeight.w400,
                          ))
                    ],
                  )),
            ),
            SizedBox(height: 20),
            Text(
              'Сортировать',
              style: TextStyle(color: Color(0xFF313131), fontSize: 20),
            ),
          ],
        ),
      );
  }
}
