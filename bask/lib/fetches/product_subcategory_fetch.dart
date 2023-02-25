import 'dart:convert';

import 'package:bask/models/category_model.dart';
import 'package:bask/models/general_subcategory_model.dart';
import 'package:http/http.dart' as http;

import '../Service/base_client.dart';
import '../models/product_subcategory_model.dart';
import '../models/subcategory_model.dart';

Future<ProductSubcategoryModel> fetchProductSubcategory(String id) async {
  final response = await BaseClient().get('/api/product/$id');

  return ProductSubcategoryModel.fromJson(jsonDecode(response));
}
