// ============================================================
// payment_service.dart
// TODO (backend): sambungkan ke endpoint Laravel
// ============================================================

import '../models/models.dart';
import 'api_service.dart';

class PaymentService {
  // GET Snap Token dari Midtrans via Laravel
  static Future<String> getSnapToken(int bookingId, int amount) async {
    final res = await ApiService.post('/payments/store', {
      'booking_id': bookingId, 
      'amount': amount,
      'method': 'midtrans',
    });
    
    if (res['snap_token'] == null) {
      throw Exception('Gagal mendapatkan kode pembayaran dari Midtrans. Pastikan Server Key sudah diatur di .env Laravel.');
    }
    
    return res['snap_token'].toString();
  }

  // TODO: POST /api/payments
  static Future<Payment> create({
    required int bookingId,
    required int amount,
    required PaymentMethod method,
    String? proofUrl,
  }) async {
    // Dummy - ganti dengan API asli nanti
    final res = await ApiService.post('/payments/store', {
      'booking_id': bookingId,
      'amount': amount,
      'method': method == PaymentMethod.manualTransfer ? 'manual_transfer' : 'midtrans',
      'proof_url': proofUrl,
    });
    return Payment.fromJson(res['payment'] ?? res['data']);
  }


  // TODO: GET /api/payments/{id}
  static Future<Payment> getById(int id) async {
    // final res = await ApiService.get('/payments/$id');
    // return Payment.fromJson(res['data']);

    await Future.delayed(const Duration(milliseconds: 500));
    throw Exception('Payment tidak ditemukan');
  }

  // TODO: POST /api/payments/{id}/upload-proof
  // Upload bukti pembayaran ke server
  static Future<String> uploadProof(int paymentId, String filePath) async {
    // Gunakan MultipartRequest untuk upload file
    // final req = http.MultipartRequest('POST', Uri.parse('${ApiService.baseUrl}/payments/$paymentId/upload-proof'));
    // req.files.add(await http.MultipartFile.fromPath('proof', filePath));
    // req.headers.addAll(ApiService.headers);
    // final res = await req.send();
    // return resBody['proof_url'];

    await Future.delayed(const Duration(seconds: 1));
    return 'https://dummy-url.com/proof.jpg';
  }
}
