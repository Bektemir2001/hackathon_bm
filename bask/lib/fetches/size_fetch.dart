import 'dart:convert';

import 'package:bask/models/category_model.dart';
import 'package:bask/models/size_model.dart';
import 'package:http/http.dart' as http;

import '../Service/base_client.dart';
import '../models/subcategory_model.dart';

Future<SizeModel> fetchSize(String productId,String colorId) async {
  final response = await BaseClient().get('/api/getSize/$productId/$colorId');
  return SizeModel.fromJson(jsonDecode(response));
}
