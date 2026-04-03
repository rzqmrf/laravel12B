class Field {
  final int id;
  final String name;
  final String category;
  final String locationType; // indoor / outdoor
  final int pricePerHour;
  final double rating;
  final int reviewCount;
  final bool isAvailable;
  final String? imageUrl;
  final String description;

  Field({
    required this.id,
    required this.name,
    required this.category,
    required this.locationType,
    required this.pricePerHour,
    required this.rating,
    required this.reviewCount,
    required this.isAvailable,
    this.imageUrl,
    required this.description,
  });

  factory Field.fromJson(Map<String, dynamic> json) => Field(
        id: json['id'],
        name: json['name'],
        category: json['category'],
        locationType: json['location_type'],
        pricePerHour: json['price_per_hour'],
        rating: (json['rating'] as num).toDouble(),
        reviewCount: json['review_count'],
        isAvailable: json['is_available'] == true || json['is_available'] == 1,
        imageUrl: json['image_url'],
        description: json['description'] ?? '',
      );

  Map<String, dynamic> toJson() => {
        'id': id,
        'name': name,
        'category': category,
        'location_type': locationType,
        'price_per_hour': pricePerHour,
        'rating': rating,
        'review_count': reviewCount,
        'is_available': isAvailable,
        'image_url': imageUrl,
        'description': description,
      };
}
