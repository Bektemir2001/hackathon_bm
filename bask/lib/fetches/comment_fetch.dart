import 'dart:convert';

import 'package:bask/models/category_model.dart';
import 'package:bask/models/product_subcategory_model.dart';
import 'package:http/http.dart' as http;

import '../Service/base_client.dart';

Future<ProductSubcategoryModel> fetchSearch(String id,String userId) async {
  var json={
    "product_id":"id",
    "user_id":"userId",
    "grade":"grade",
    "comment":"comment"
  };
  final response = await BaseClient().post('/api/search/product',json);

  return ProductSubcategoryModel.fromJson(jsonDecode(response));
}
