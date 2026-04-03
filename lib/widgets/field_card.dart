import 'package:flutter/material.dart';
import '../models/field.dart';
import '../theme/app_theme.dart';
import 'common_widgets.dart';

const _categoryEmoji = {
  'Futsal': '⚽',
  'Badminton': '🏸',
  'Basket': '🏀',
  'Voli': '🏐',
  'Tenis Meja': '🏓',
  'Tenis': '🎾',
};

const _categoryColor = {
  'Futsal': Color(0xFFEBF9F0),
  'Badminton': Color(0xFFFEF3C7),
  'Basket': Color(0xFFDBEAFE),
  'Voli': Color(0xFFFCE7F3),
  'Tenis Meja': Color(0xFFEDE9FE),
  'Tenis': Color(0xFFD1FAE5),
};

class FieldCard extends StatelessWidget {
  final Field field;
  final VoidCallback onBook;

  const FieldCard({super.key, required this.field, required this.onBook});

  @override
  Widget build(BuildContext context) {
    final emoji = _categoryEmoji[field.category] ?? '🏟️';
    final bgColor = _categoryColor[field.category] ?? AppColors.primaryLight;

    return Card(
      clipBehavior: Clip.antiAlias,
      child: InkWell(
        onTap: onBook,
        borderRadius: BorderRadius.circular(14),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            // Image / emoji area
            Container(
              height: 110, width: double.infinity,
              color: bgColor,
              child: Stack(children: [
                Center(child: Text(emoji, style: const TextStyle(fontSize: 46))),
                Positioned(
                  top: 10, right: 10,
                  child: Container(
                    padding: const EdgeInsets.symmetric(horizontal: 8, vertical: 4),
                    decoration: BoxDecoration(
                      color: field.isAvailable ? AppColors.successBg : AppColors.warningBg,
                      borderRadius: BorderRadius.circular(6),
                      border: Border.all(
                        color: field.isAvailable
                            ? AppColors.success.withOpacity(0.3)
                            : AppColors.warning.withOpacity(0.3),
                      ),
                    ),
                    child: Text(
                      field.isAvailable ? 'Tersedia' : 'Penuh',
                      style: TextStyle(
                        color: field.isAvailable ? AppColors.success : AppColors.warning,
                        fontSize: 10, fontWeight: FontWeight.w700,
                      ),
                    ),
                  ),
                ),
              ]),
            ),
            Padding(
              padding: const EdgeInsets.all(12),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Text(field.name,
                      style: const TextStyle(fontSize: 14, fontWeight: FontWeight.w700, color: AppColors.textPrimary),
                      maxLines: 1, overflow: TextOverflow.ellipsis),
                  const SizedBox(height: 2),
                  Text('${field.category} · ${field.locationType}',
                      style: const TextStyle(fontSize: 11, color: AppColors.textSecondary)),
                  const SizedBox(height: 8),
                  Row(children: [
                    const Icon(Icons.star_rounded, size: 13, color: Color(0xFFF6AD55)),
                    const SizedBox(width: 2),
                    Text('${field.rating}',
                        style: const TextStyle(fontSize: 11, fontWeight: FontWeight.w600, color: AppColors.textSecondary)),
                    Text(' (${field.reviewCount})',
                        style: const TextStyle(fontSize: 10, color: AppColors.textHint)),
                  ]),
                  const SizedBox(height: 10),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      PriceBadge(price: field.pricePerHour),
                      SizedBox(
                        height: 30,
                        child: ElevatedButton(
                          onPressed: field.isAvailable ? onBook : null,
                          style: ElevatedButton.styleFrom(
                            padding: const EdgeInsets.symmetric(horizontal: 14),
                            textStyle: const TextStyle(fontSize: 12, fontWeight: FontWeight.w600),
                            shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(8)),
                          ),
                          child: const Text('Booking'),
                        ),
                      ),
                    ],
                  ),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}
