import 'dart:convert';

import 'package:bask/models/category_model.dart';
import 'package:bask/models/email_model.dart';
import 'package:bask/models/general_subcategory_model.dart';
import 'package:http/http.dart' as http;

import '../Service/base_client.dart';
import '../models/product_subcategory_model.dart';
import '../models/subcategory_model.dart';

Future<String> fetchFavorite(String userId,String productId) async {
  var json={
    'user_id': userId,
    'product_id':productId
  };
  final response = await BaseClient().post('/api/favorite/',json);

  return '';
}

Future<ProductSubcategoryModel> fetchFavoriteGet(String userId) async {
  final response = await BaseClient().get('/api/get/favorite/$userId');

  return ProductSubcategoryModel.fromJson(jsonDecode(response));
}
