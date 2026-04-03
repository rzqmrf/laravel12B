// ============================================================
// auth_service.dart
// TODO (backend): sambungkan ke endpoint Laravel Auth
// ============================================================

import '../models/user.dart';
import 'api_service.dart';

class AuthService {
  // TODO: POST /api/login
  static Future<Map<String, dynamic>> login(String email, String password) async {
    // Dummy - ganti dengan:
    // final res = await ApiService.post('/login', {'email': email, 'password': password});
    // ApiService.setToken(res['token']);
    // return res;
    await Future.delayed(const Duration(seconds: 1));
    return {'token': 'dummy-token', 'user': {}};
  }

  // TODO: POST /api/register
  static Future<Map<String, dynamic>> register({
    required String name,
    required String email,
    required String password,
    required String phone,
  }) async {
    // Dummy - ganti dengan:
    // return await ApiService.post('/register', {...});
    await Future.delayed(const Duration(seconds: 1));
    return {'message': 'Registrasi berhasil'};
  }

  // TODO: POST /api/logout
  static Future<void> logout() async {
    // await ApiService.post('/logout', {});
    ApiService.clearToken();
  }

  // TODO: GET /api/user
  static Future<User?> getProfile() async {
    // final res = await ApiService.get('/user');
    // return User.fromJson(res['data']);
    return null;
  }
}
