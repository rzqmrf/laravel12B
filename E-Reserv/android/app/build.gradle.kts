plugins {
    id("com.android.application")
    id("kotlin-android")
    // Flutter Gradle Plugin harus setelah Android & Kotlin
    id("dev.flutter.flutter-gradle-plugin")
}

android {
    namespace = "com.example.e_reserv"

    // Paksa pakai versi terbaru
    compileSdk = 34
    buildToolsVersion = "34.0.0"

    ndkVersion = flutter.ndkVersion

    compileOptions {
        sourceCompatibility = JavaVersion.VERSION_17
        targetCompatibility = JavaVersion.VERSION_17
    }

    kotlinOptions {
        jvmTarget = JavaVersion.VERSION_17.toString()
    }

    defaultConfig {
        applicationId = "com.example.e_reserv"
        minSdk = flutter.minSdkVersion         // sesuaikan kebutuhan
        targetSdk = 34
        versionCode = flutter.versionCode
        versionName = flutter.versionName
    }

    buildTypes {
        release {
            signingConfig = signingConfigs.getByName("debug")
        }
    }
}

flutter {
    source = "../.."
}
