import 'package:bask/views/pages/search/search_result.dart';
import 'package:bask/views/widgets/appBar.dart';
import 'package:flutter/material.dart';

class Search extends StatefulWidget {
  const Search({Key? key}) : super(key: key);

  @override
  _SearchState createState() => _SearchState();
}

class _SearchState extends State<Search> {
  TextEditingController t1=TextEditingController();
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AllAppBar(),
      backgroundColor: Colors.white,
      body: ListView(
        padding: EdgeInsets.all(20),
        children: [
          Container(
            width: 300,
            height: 45,
            decoration: BoxDecoration(
              border: Border.all(
                width: 1,
                color: Color(0xFF225196),
              ),
              borderRadius: BorderRadius.circular(10),
            ),
            child: TextField(
              controller: t1,
              style: TextStyle(
                color: Color(0xFF225196),
                fontSize: 16,
              ),
              decoration: InputDecoration(

                hintStyle: TextStyle(
                  color: Color(0xFF225196).withOpacity(0.5),
                ),
                hintText: 'Поиск',
                border: InputBorder.none,
                prefixIcon: IconButton(icon: Icon(Icons.search),onPressed: (){
                    Navigator.of(context).push(MaterialPageRoute(builder:(context)=>SearchResult(t1: t1.text,)));
                  },),
                ),
              ),
            ),
        ],
      ),
    );
  }
}
