class ProductSubcategoryModel {
  List<Data>? data;

  ProductSubcategoryModel({this.data});

  ProductSubcategoryModel.fromJson(Map<String, dynamic> json) {
    if (json['data'] != null) {
      data = <Data>[];
      json['data'].forEach((v) {
        data!.add(new Data.fromJson(v));
      });
    }
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    if (this.data != null) {
      data['data'] = this.data!.map((v) => v.toJson()).toList();
    }
    return data;
  }
}

class Data {
  int? id;
  int? subcategoryId;
  String? name;
  String? description;
  int? price;
  String? image;
  int? count;
  String? createdAt;
  String? updatedAt;
  List<ColorsClass>? colors;

  Data(
      {this.id,
        this.subcategoryId,
        this.name,
        this.description,
        this.price,
        this.image,
        this.count,
        this.createdAt,
        this.updatedAt,
        this.colors});

  Data.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    subcategoryId = json['subcategory_id'];
    name = json['name'];
    description = json['description'];
    price = json['price'];
    image = json['image'];
    count = json['count'];
    createdAt = json['created_at'];
    updatedAt = json['updated_at'];
    if (json['colors'] != null) {
      colors = <ColorsClass>[];
      json['colors'].forEach((v) {
        colors!.add(new ColorsClass.fromJson(v));
      });
    }
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['id'] = this.id;
    data['subcategory_id'] = this.subcategoryId;
    data['name'] = this.name;
    data['description'] = this.description;
    data['price'] = this.price;
    data['image'] = this.image;
    data['count'] = this.count;
    data['created_at'] = this.createdAt;
    data['updated_at'] = this.updatedAt;
    if (this.colors != null) {
      data['colors'] = this.colors!.map((v) => v.toJson()).toList();
    }
    return data;
  }
}

class ColorsClass {
  int? colorId;
  String? color;
  String? image;

  ColorsClass({this.colorId, this.color, this.image});

  ColorsClass.fromJson(Map<String, dynamic> json) {
    colorId = json['color_id'];
    color = json['color'];
    image = json['image'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['color_id'] = this.colorId;
    data['color'] = this.color;
    data['image'] = this.image;
    return data;
  }
}
