<?php return array (
  'app' => 
  array (
    'name' => 'Laravel',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://localhost8080',
    'asset_url' => '/',
    'timezone' => 'Asia/Jakarta',
    'locale' => 'id',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'key' => 'base64:9d3BS9VgpjPyfvdrK1LXcCwSOS4YUJMddIweSVnwjXc=',
    'cipher' => 'AES-256-CBC',
    'maintenance' => 
    array (
      'driver' => 'file',
    ),
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'App\\Providers\\AppServiceProvider',
      23 => 'App\\Providers\\AuthServiceProvider',
      24 => 'App\\Providers\\EventServiceProvider',
      25 => 'App\\Providers\\RouteServiceProvider',
      26 => 'Spatie\\Permission\\PermissionServiceProvider',
      27 => 'Intervention\\Image\\ImageServiceProvider',
      28 => 'Weidner\\Goutte\\GoutteServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Date' => 'Illuminate\\Support\\Facades\\Date',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Js' => 'Illuminate\\Support\\Js',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Process' => 'Illuminate\\Support\\Facades\\Process',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'RateLimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Vite' => 'Illuminate\\Support\\Facades\\Vite',
      'Image' => 'Intervention\\Image\\Facades\\Image',
      'Excel' => 'Maatwebsite\\Excel\\Facades\\Excel',
      'Goutte' => 'Weidner\\Goutte\\GoutteFacade',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'sanctum' => 
      array (
        'driver' => 'sanctum',
        'provider' => NULL,
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'base' => 
  array (
    'sidebar' => 
    array (
      'color' => 're',
      'logo' => '/img/logo.jpg',
      'sidebar_name' => 'Toko Natan',
      'sidebar_list' => 
      array (
        'dashboard' => 
        array (
          0 => 
          array (
            0 => 'turunan 1',
            1 => 'turunan 2',
          ),
          1 => 
          array (
            0 => 'logo',
          ),
          2 => 
          array (
            0 => 'urlnya',
          ),
        ),
      ),
    ),
    'footer' => 
    array (
      'footer_left' => '2024-08-04',
      'footer_right' => '2024-08-04',
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'host' => 'api-mt1.pusher.com',
          'port' => '443',
          'scheme' => 'https',
          'encrypted' => true,
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
        'lock_connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'D:\\skripsiku\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
    ),
    'prefix' => 'laravel_cache_',
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => 'x-csrf-token',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'skripsi-nanda',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'skripsi-nanda',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => false,
        'engine' => NULL,
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'skripsi-nanda',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'search_path' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'skripsi-nanda',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'laravel_database_',
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
      ),
    ),
  ),
  'enum' => 
  array (
    'sosial_media_tipe' => 
    array (
      0 => 'facebook',
      1 => 'instagram',
      2 => 'youtube',
      3 => 'twitter',
      4 => 'whatsapp',
    ),
    'post' => 
    array (
      0 => 'berita',
      1 => 'lkk',
      2 => 'bencana',
      3 => 'potensi',
    ),
    'pendidikan' => 
    array (
      0 => 'SLTA / SEDERAJAT',
      1 => 'SLTP/SEDERAJAT',
      2 => 'TIDAK / BELUM SEKOLAH',
      3 => 'TAMAT SD / SEDERAJAT',
      4 => 'BELUM TAMAT SD/SEDERAJAT',
      5 => 'DIPLOMA IV/ STRATA I',
      6 => 'AKADEMI/ DIPLOMA III/S. MUDA',
      7 => 'STRATA II',
      8 => 'DIPLOMA I / II',
      9 => 'STRATA III',
    ),
    'pendidikan_ditempuh' => 
    array (
      0 => 'SEDANG TK/KELOMPOK BERMAIN',
      1 => 'SEDANG S-2/SEDERAJAT',
      2 => 'BELUM MASUK TK / KELOMPOK BERMAIN',
      3 => 'SEDANG S-1/SEDERAJAT',
      4 => 'SEDANG D-3/SEDERAJAT',
      5 => 'SEDANG D-2/SEDERAJAT',
      6 => 'SEDANG D-1/SEDERAJAT',
      7 => 'SEDANG SLTA/SEDERAJAT',
      8 => 'SEDANG SD/SEDERAJAT',
      9 => 'TIDAK DAPAT MEMBACA DAN MENULIS',
      10 => 'SEDANG SLTP/SEDERAJAT',
      11 => 'SEDANG SLB C/SEDERAJAT',
      12 => 'TIDAK TAMAT SD/SEDERAJAT',
      13 => 'TIDAK SEDANG SEKOLAH',
    ),
    'konten' => 
    array (
      0 => 'visi_misi',
      1 => 'profil_dan_wilayah',
      2 => 'pamong_kalurahan',
      3 => 'kepala_desa',
      4 => 'badan_permusyawaratan',
      5 => 'sejarah_kalurahan',
      6 => 'gambaran_umum',
      7 => 'layanan_kesehatan',
    ),
    'gol_darah' => 
    array (
      0 => 'TIDAK TAHU',
      1 => 'O',
      2 => 'B',
      3 => 'A',
      4 => 'AB',
      5 => 'AB-',
      6 => 'A+',
      7 => 'B-',
      8 => 'O+',
      9 => 'A-',
      10 => 'AB+',
      11 => 'O-',
      12 => 'B+',
    ),
    'kawin' => 
    array (
      0 => 'KAWIN',
      1 => 'BELUM KAWIN',
      2 => 'CERAI MATI',
      3 => 'CERAI HIDUP',
    ),
    'agama' => 
    array (
      0 => 'ISLAM',
      1 => 'KRISTEN',
      2 => 'KATHOLIK',
      3 => 'HINDU',
      4 => 'BUDHA',
      5 => 'KHONGHUCU',
      6 => 'Kepercayaan Terhadap Tuhan YME / Lainnya',
    ),
    'hub_keluarga' => 
    array (
      0 => 'ANAK',
      1 => 'baik',
      2 => 'CUCU',
      3 => 'FAMILI LAIN',
      4 => 'ISTRI',
      5 => 'KEPALA KELUARGA',
      6 => 'LAINNYA',
      7 => 'MENANTU',
      8 => 'MERTUA',
      9 => 'ORANGTUA',
      10 => 'PEMBANTU',
      11 => 'SUAMI',
    ),
    'pekerjaan' => 
    array (
      0 => 'PELAJAR/MAHASISWA',
      1 => 'BELUM/TIDAK BEKERJA',
      2 => 'KARYAWAN SWASTA',
      3 => 'MENGURUS RUMAH TANGGA',
      4 => 'BURUH HARIAN LEPAS',
      5 => 'WIRASWASTA',
      6 => 'PEGAWAI NEGERI SIPIL (PNS)',
      7 => 'PENSIUNAN',
      8 => 'PETANI/PERKEBUNAN',
      9 => 'PERDAGANGAN',
      10 => 'GURU',
      11 => 'BURUH TANI/PERKEBUNAN',
      12 => 'PEDAGANG',
      13 => 'KEPOLISIAN RI (POLRI)',
      14 => 'KARYAWAN HONORER',
      15 => 'TENTARA NASIONAL INDONESIA (TNI)',
      16 => 'LAINNYA',
      17 => 'KARYAWAN BUMN',
      18 => 'DOSEN',
      19 => 'KONSTRUKSI',
      20 => 'INDUSTRI',
      21 => 'PERAWAT',
      22 => 'KARYAWAN BUMD',
      23 => 'PERANGKAT DESA',
      24 => 'DOKTER',
      25 => 'SOPIR',
      26 => 'TUKANG BATU',
      27 => 'TUKANG KAYU',
      28 => 'TUKANG JAHIT',
      29 => 'MEKANIK',
      30 => 'SENIMAN',
      31 => 'BIDAN',
      32 => 'PEMBANTU RUMAH TANGGA',
      33 => 'TRANSPORTASI',
      34 => 'KONSULTAN',
      35 => 'PETERNAK',
      36 => 'WARTAWAN',
      37 => 'PELAUT',
      38 => 'TUKANG LAS/PANDAI BESI',
      39 => 'PENATA RIAS',
      40 => 'PENGACARA',
      41 => 'ARSITEK',
      42 => 'BURUH PETERNAKAN',
      43 => 'PENATA RAMBUT',
      44 => 'APOTEKER',
      45 => 'BIARAWATI',
      46 => 'PENDETA',
      47 => 'USTADZ/MUBALIGH',
      48 => 'PENELITI',
      49 => 'KEPALA DESA',
      50 => 'TUKANG LISTRIK',
      51 => 'BURUH NELAYAN/PERIKANAN',
      52 => 'TUKANG CUKUR',
      53 => 'PASTOR',
      54 => 'NELAYAN/PERIKANAN',
      55 => 'JURU MASAK',
      56 => 'NOTARIS',
      57 => 'BUPATI',
      58 => 'ANGGOTA DPR-RI',
      59 => 'PRESIDEN',
      60 => 'PARANORMAL',
      61 => 'ANGGOTA KABINET KEMENTERIAN',
      62 => 'AKUNTAN',
      63 => 'PARAJI',
      64 => 'WAKIL GUBERNUR',
      65 => 'IMAM MASJID',
      66 => 'WALIKOTA',
      67 => 'PSIKIATER/PSIKOLOG',
      68 => 'TUKANG SOL SEPATU',
      69 => 'PROMOTOR ACARA',
      70 => 'ANGGOTA DPRD KABUPATEN/KOTA',
      71 => 'TUKANG GIGI',
      72 => 'ANGGOTA BPK',
      73 => 'PILOT',
      74 => 'PIALANG',
      75 => 'ANGGOTA MAHKAMAH KONSTITUSI',
      76 => 'TABIB',
      77 => 'GUBERNUR',
      78 => 'PENTERJEMAH',
      79 => 'WAKIL BUPATI',
      80 => 'ANGGOTA DPRD PROVINSI',
      81 => 'PENYIAR RADIO',
      82 => 'ANGGOTA DPD',
      83 => 'PENATA BUSANA',
      84 => 'WAKIL PRESIDEN',
      85 => 'DUTA BESAR',
      86 => 'PERANCANG BUSANA',
      87 => 'WAKIL WALIKOTA',
      88 => 'PENYIAR TELEVISI',
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'D:\\skripsiku\\storage\\app',
        'throw' => false,
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'D:\\skripsiku\\storage\\app/public',
        'url' => 'http://localhost8080/storage',
        'visibility' => 'public',
        'throw' => false,
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
        'endpoint' => NULL,
        'use_path_style_endpoint' => false,
        'throw' => false,
      ),
    ),
    'links' => 
    array (
      'D:\\skripsiku\\public\\storage' => 'D:\\skripsiku\\storage\\app/public',
    ),
  ),
  'goutte' => 
  array (
    'client' => 
    array (
      'max_redirects' => 0,
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 65536,
      'threads' => 1,
      'time' => 4,
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'deprecations' => 
    array (
      'channel' => NULL,
      'trace' => false,
    ),
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => 'D:\\skripsiku\\storage\\logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'D:\\skripsiku\\storage\\logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'debug',
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
          'connectionString' => 'tls://:',
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => 'D:\\skripsiku\\storage\\logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'host' => 'smtp.gmail.com',
        'port' => '465',
        'encryption' => 'tls',
        'username' => 'nurdi014@gmail.com',
        'password' => 'wfivnknlnkdwcdst',
        'timeout' => NULL,
        'local_domain' => NULL,
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'mailgun' => 
      array (
        'transport' => 'mailgun',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs -i',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
      'failover' => 
      array (
        'transport' => 'failover',
        'mailers' => 
        array (
          0 => 'smtp',
          1 => 'log',
        ),
      ),
    ),
    'from' => 
    array (
      'address' => 'nurdi014@gmail.com',
      'name' => 'Laravel',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'D:\\skripsiku\\resources\\views/vendor/mail',
      ),
    ),
  ),
  'nrconfig' => 
  array (
    'logo' => '/img/logo.jpg',
    'sidebar_name' => '',
  ),
  'permission' => 
  array (
    'models' => 
    array (
      'permission' => 'App\\Models\\Permission',
      'role' => 'App\\Models\\Role',
    ),
    'table_names' => 
    array (
      'roles' => 'roles',
      'permissions' => 'permissions',
      'model_has_permissions' => 'model_has_permissions',
      'model_has_roles' => 'model_has_roles',
      'role_has_permissions' => 'role_has_permissions',
    ),
    'column_names' => 
    array (
      'role_pivot_key' => NULL,
      'permission_pivot_key' => NULL,
      'model_morph_key' => 'model_id',
      'team_foreign_key' => 'team_id',
    ),
    'register_permission_check_method' => true,
    'teams' => false,
    'display_permission_in_exception' => false,
    'display_role_in_exception' => false,
    'enable_wildcard_permission' => false,
    'cache' => 
    array (
      'expiration_time' => 
      \DateInterval::__set_state(array(
         'from_string' => true,
         'date_string' => '24 hours',
      )),
      'key' => 'spatie.permission.cache',
      'store' => 'default',
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'sanctum' => 
  array (
    'stateful' => 
    array (
      0 => 'localhost',
      1 => 'localhost:3000',
      2 => '127.0.0.1',
      3 => '127.0.0.1:8000',
      4 => '::1',
      5 => 'localhost8080',
    ),
    'guard' => 
    array (
      0 => 'web',
    ),
    'expiration' => NULL,
    'middleware' => 
    array (
      'verify_csrf_token' => 'App\\Http\\Middleware\\VerifyCsrfToken',
      'encrypt_cookies' => 'App\\Http\\Middleware\\EncryptCookies',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
      'scheme' => 'https',
    ),
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
    'telegram-bot-api' => 
    array (
      'token' => NULL,
    ),
    'google' => 
    array (
      'client_id' => '362374546580-rggaisu3athdplv6usgrcoicb7clp215.apps.googleusercontent.com',
      'client_secret' => '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',
      'redirect' => 'http://localhost:8000/authorized/google/callback',
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => 'D:\\skripsiku\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'laravel_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => 'D:\\skripsiku\\resources\\views',
    ),
    'compiled' => 'D:\\skripsiku\\storage\\framework\\views',
  ),
  'dompdf' => 
  array (
    'show_warnings' => false,
    'public_path' => NULL,
    'convert_entities' => true,
    'options' => 
    array (
      'font_dir' => 'D:\\skripsiku\\storage\\fonts',
      'font_cache' => 'D:\\skripsiku\\storage\\fonts',
      'temp_dir' => 'C:\\Users\\Amanjivaa\\AppData\\Local\\Temp',
      'chroot' => 'D:\\skripsiku',
      'allowed_protocols' => 
      array (
        'file://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'http://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'https://' => 
        array (
          'rules' => 
          array (
          ),
        ),
      ),
      'log_output_file' => NULL,
      'enable_font_subsetting' => false,
      'pdf_backend' => 'CPDF',
      'default_media_type' => 'screen',
      'default_paper_size' => 'a4',
      'default_paper_orientation' => 'portrait',
      'default_font' => 'serif',
      'dpi' => 96,
      'enable_php' => false,
      'enable_javascript' => true,
      'enable_remote' => true,
      'font_height_ratio' => 1.1,
      'enable_html5_parser' => true,
    ),
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'livewire' => 
  array (
    'class_namespace' => 'App\\Http\\Livewire',
    'view_path' => 'D:\\skripsiku\\resources\\views/livewire',
    'layout' => 'layouts.app',
    'asset_url' => NULL,
    'app_url' => NULL,
    'middleware_group' => 'web',
    'temporary_file_upload' => 
    array (
      'disk' => NULL,
      'rules' => NULL,
      'directory' => NULL,
      'middleware' => NULL,
      'preview_mimes' => 
      array (
        0 => 'png',
        1 => 'gif',
        2 => 'bmp',
        3 => 'svg',
        4 => 'wav',
        5 => 'mp4',
        6 => 'mov',
        7 => 'avi',
        8 => 'wmv',
        9 => 'mp3',
        10 => 'm4a',
        11 => 'jpg',
        12 => 'jpeg',
        13 => 'mpga',
        14 => 'webp',
        15 => 'wma',
      ),
      'max_upload_time' => 5,
    ),
    'manifest_path' => NULL,
    'back_button_cache' => false,
    'render_on_redirect' => false,
  ),
  'flare' => 
  array (
    'key' => NULL,
    'flare_middleware' => 
    array (
      0 => 'Spatie\\FlareClient\\FlareMiddleware\\RemoveRequestIp',
      1 => 'Spatie\\FlareClient\\FlareMiddleware\\AddGitInformation',
      2 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddNotifierName',
      3 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddEnvironmentInformation',
      4 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddExceptionInformation',
      5 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddDumps',
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddLogs' => 
      array (
        'maximum_number_of_collected_logs' => 200,
      ),
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddQueries' => 
      array (
        'maximum_number_of_collected_queries' => 200,
        'report_query_bindings' => true,
      ),
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddJobs' => 
      array (
        'max_chained_job_reporting_depth' => 5,
      ),
      'Spatie\\FlareClient\\FlareMiddleware\\CensorRequestBodyFields' => 
      array (
        'censor_fields' => 
        array (
          0 => 'password',
          1 => 'password_confirmation',
        ),
      ),
      'Spatie\\FlareClient\\FlareMiddleware\\CensorRequestHeaders' => 
      array (
        'headers' => 
        array (
          0 => 'API-KEY',
        ),
      ),
    ),
    'send_logs_as_events' => true,
  ),
  'ignition' => 
  array (
    'editor' => 'phpstorm',
    'theme' => 'auto',
    'enable_share_button' => true,
    'register_commands' => false,
    'solution_providers' => 
    array (
      0 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\BadMethodCallSolutionProvider',
      1 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\MergeConflictSolutionProvider',
      2 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\UndefinedPropertySolutionProvider',
      3 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\IncorrectValetDbCredentialsSolutionProvider',
      4 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingAppKeySolutionProvider',
      5 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\DefaultDbNameSolutionProvider',
      6 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\TableNotFoundSolutionProvider',
      7 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingImportSolutionProvider',
      8 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\InvalidRouteActionSolutionProvider',
      9 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\ViewNotFoundSolutionProvider',
      10 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\RunningLaravelDuskInProductionProvider',
      11 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingColumnSolutionProvider',
      12 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\UnknownValidationSolutionProvider',
      13 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingMixManifestSolutionProvider',
      14 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingViteManifestSolutionProvider',
      15 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingLivewireComponentSolutionProvider',
      16 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\UndefinedViewVariableSolutionProvider',
      17 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\GenericLaravelExceptionSolutionProvider',
      18 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\OpenAiSolutionProvider',
    ),
    'ignored_solution_providers' => 
    array (
    ),
    'enable_runnable_solutions' => NULL,
    'remote_sites_path' => 'D:\\skripsiku',
    'local_sites_path' => '',
    'housekeeping_endpoint_prefix' => '_ignition',
    'settings_file_path' => '',
    'recorders' => 
    array (
      0 => 'Spatie\\LaravelIgnition\\Recorders\\DumpRecorder\\DumpRecorder',
      1 => 'Spatie\\LaravelIgnition\\Recorders\\JobRecorder\\JobRecorder',
      2 => 'Spatie\\LaravelIgnition\\Recorders\\LogRecorder\\LogRecorder',
      3 => 'Spatie\\LaravelIgnition\\Recorders\\QueryRecorder\\QueryRecorder',
    ),
    'open_ai_key' => NULL,
  ),
  'scavenger' => 
  array (
    'debug' => false,
    'log' => true,
    'verbosity' => 1,
    'database' => 
    array (
      'scraps_table' => 'scavenger_scraps',
    ),
    'daemon' => 
    array (
      'model' => 'App\\User',
      'id_prop' => 'email',
      'id' => 'daemon@scavenger.reliqarts.com',
      'info' => 
      array (
        'name' => 'Scavenger Daemon',
        'password' => 'pass',
      ),
    ),
    'hash_algorithm' => 'sha512',
    'storage' => 
    array (
      'log_dir' => 'scavenger',
    ),
    'targets' => 
    array (
      'rooms' => 
      array (
        'example' => true,
        'serp' => false,
        'model' => 'App\\Room',
        'source' => 'http://myroomslistingsite.1demo/section/rooms',
        'search' => 
        array (
          'keywords' => 
          array (
            0 => 'professional',
          ),
          'form' => 
          array (
            'selector' => '#form',
            'keyword_input_name' => 'keyword',
            'submit_button' => 
            array (
              'text' => NULL,
              'id' => NULL,
            ),
          ),
        ),
        'pager' => 
        array (
          'selector' => 'div.content #page a.pagingnav',
        ),
        'pages' => 0,
        'markup' => 
        array (
          'title' => 'div.content section > table tr h3',
          '__inside' => 
          array (
            'title' => '#ad-title > h1 > a',
            'body' => 'article .adcontent > p[align="LEFT"]:last-of-type',
            '__focus' => 'section section > .content #ad-detail > article',
          ),
          '__result' => NULL,
        ),
        'dissect' => 
        array (
          'body' => 
          array (
            'email' => '(([eE]mail)*:*\\s*\\w+\\@(\\s*\\w)*\\.(net|com))',
            'phone' => '((([cC]all|[[tT]el|[Pp][Hh](one)*)[:\\d\\-,\\sDL\\/]*\\d)|(\\d{3}\\-?\\d{4}))',
            'beds' => '([\\d]+[\\d\\.\\/\\s]*[^\\w]*([Bb]edroom|b\\/r|[Bb]ed)s?)',
            'baths' => '([\\d]+[\\d\\.\\/\\s]*[^\\w]*([Bb]athroom|bth|[Bb]ath)s?)',
            '__retain' => true,
          ),
        ),
        'preprocess' => 
        array (
          'title' => NULL,
        ),
        'remap' => 
        array (
          'title' => NULL,
          'body' => NULL,
        ),
        'bad_words' => 
        array (
          0 => 'office',
        ),
      ),
      'google' => 
      array (
        'example' => true,
        'serp' => true,
        'model' => 'App\\GoogleResult',
        'source' => 'https://www.google.com',
        'search' => 
        array (
          'keywords' => 
          array (
            0 => 'dog',
          ),
          'form' => 
          array (
            'selector' => 'form[name="f"]',
            'keyword_input_name' => 'q',
          ),
        ),
        'pages' => 2,
        'pager' => 
        array (
          'selector' => '#foot > table > tr > td.b:last-child a',
        ),
        'markup' => 
        array (
          '__result' => 'div.g',
          'title' => 'h3 > a',
          'description' => '.st',
          'link' => '__link',
          'position' => '__position',
        ),
      ),
      'bing' => 
      array (
        'example' => true,
        'serp' => true,
        'model' => 'App\\BingResult',
        'source' => 'https://www.bing.com',
        'search' => 
        array (
          'keywords' => 
          array (
            0 => 'dog',
          ),
          'form' => 
          array (
            'selector' => 'form#sb_form',
            'keyword_input_name' => 'q',
          ),
        ),
        'pages' => 3,
        'pager' => 
        array (
          'selector' => '.sb_pagN',
        ),
        'markup' => 
        array (
          '__result' => '.b_algo',
          'title' => 'h2 a',
          'description' => '.b_caption p',
          'link' => '__link',
          'position' => '__position',
        ),
      ),
    ),
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
