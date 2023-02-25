import 'dart:convert';

import 'package:bask/models/category_model.dart';
import 'package:bask/models/product_subcategory_model.dart';
import 'package:http/http.dart' as http;

import '../Service/base_client.dart';

Future<ProductSubcategoryModel> fetchSearch(String t1) async {
  var json={
    'search': t1
  };
  final response = await BaseClient().post('/api/search/product',json);

  return ProductSubcategoryModel.fromJson(jsonDecode(response));
}
