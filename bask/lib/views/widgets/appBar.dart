import 'package:bask/views/pages/search/search.dart';
import 'package:flutter/material.dart';

class AllAppBar extends StatelessWidget implements PreferredSizeWidget {
  const AllAppBar({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return AppBar(
      iconTheme: IconThemeData(
        color: Color(0xFF225196)
      ),
      elevation: 0,
      backgroundColor: Colors.white,
      actions: [
        IconButton(onPressed: (){
          Navigator.of(context).push(MaterialPageRoute(builder:(context)=>Search()));
        }, icon: Icon(Icons.search))
      ],
    );
  }

  @override
  // TODO: implement preferredSize
  Size get preferredSize => Size.fromHeight(kToolbarHeight);
}
