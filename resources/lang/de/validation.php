<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines DEUTSCH
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'                    => 'Das :Attribut muss akzeptiert werden.',
    'active_url'                  => 'Das :Attribut ist keine gültige URL.',
    'after'                       => 'Das :Attribut muss ein Datum nach :date sein.',
    'after_or_equal'              => 'Das :attribute muss ein Datum nach oder gleich :date sein.',
    'alpha'                       => 'Das :Attribut darf nur Buchstaben enthalten.',
    'alpha_dash'                  => 'Das :Attribut darf nur Buchstaben, Zahlen und Bindestriche enthalten.',
    "ascii_only"                  => "Das :Attribut darf nur Buchstaben, Zahlen und Bindestriche enthalten.",
    'alpha_num'                   => 'Das :Attribut darf nur Buchstaben und Zahlen enthalten.',
    'array'                       => 'Das :Attribut muss ein Array sein.',
    'before'                      => 'Das :Attribut muss ein Datum vor :date sein.',
    'before_or_equal'             => 'Das :attribute muss ein Datum vor oder gleich :date sein.',
    'between'                     => [
        'numeric'                 => 'Das :Attribut muss zwischen :min und :max liegen.',
        'file'                    => 'Das :Attribut muss zwischen :min und :max Kilobyte liegen.',
        'string'                  => 'Das :Attribut muss zwischen :min und :max Zeichen liegen.',
        'array'                   => 'Das :attribute muss zwischen :min und :max Elemente haben.',
    ],
    'boolean'                     => 'Das Feld :attribute muss wahr oder falsch sein.',
    'confirmed'                   => 'Die :Attribut-Bestätigung stimmt nicht überein.',
    'date'                        => 'Das :attribute ist kein gültiges Datum.',
    'date_format'                 => 'Das :attribut stimmt nicht mit dem Format :format überein.',
    'different'                   => 'Das :attribute und :other müssen unterschiedlich sein.',
    'digits'                      => 'Das :Attribut muss :digits Ziffern sein.',
    'digits_between'              => 'Das :Attribut muss zwischen :min und :max Ziffern liegen.',
    'dimensions'                  => 'Das :attribute hat ungültige Bildabmessungen (:min_width x :min_height px).',
    'distinct'                    => 'Das Feld :attribute hat einen doppelten Wert.',
    'email'                       => 'Das :Attribut muss eine gültige E-Mail-Adresse sein.',
    'exists'                      => 'Das ausgewählte :Attribut ist ungültig.',
    'file'                        => 'Das :Attribut muss eine Datei sein.',
    'filled'                      => 'Das Feld :attribute muss einen Wert haben.',
    'gt'                          => [
        'numeric'                 => 'Das :attribute muss größer als :value sein.',
        'file'                    => 'Das :Attribut muss größer als :value Kilobyte sein.',
        'string'                  => 'Das :attribute muss größer sein als :value Zeichen.',
        'array'                   => 'Das :attribute muss mehr als :value Elemente haben.',
    ],
    'gte'                         => [
        'numeric'                 => 'Das :attribute muss größer oder gleich :value sein.',
        'file'                    => 'Das :Attribut muss größer oder gleich :value Kilobyte sein.',
        'string'                  => 'Das :attribute muss größer oder gleich :value Zeichen sein.',
        'array'                   => 'Das :attribute muss :value Elemente oder mehr haben.',
    ],
    'image'                       => 'Das :Attribut muss ein Bild sein.',
    'in'                          => 'Das ausgewählte :Attribut ist ungültig.',
    'in_array'                    => 'Das Feld :attribute existiert nicht in :other.',
    'integer'                     => 'Das :Attribut muss eine ganze Zahl sein.',
    'ip'                          => 'Das :Attribut muss eine gültige IP-Adresse sein.',
    'ipv4'                        => 'Das :Attribut muss eine gültige IPv4-Adresse sein.',
    'ipv6'                        => 'Das :Attribut muss eine gültige IPv6-Adresse sein.',
    'json'                        => 'Das :Attribut muss eine gültige JSON-Zeichenfolge sein.',
    'lt'                          => [
        'numeric'                 => 'Das :attribute muss kleiner als :value sein.',
        'file'                    => 'Das :Attribut muss kleiner als :value Kilobyte sein.',
        'string'                  => 'Das :attribute muss kleiner als :value Zeichen sein.',
        'array'                   => 'Das :attribute muss weniger als :value Elemente haben.',
    ],
    'lte'                         => [
        'numeric'                 => 'Das :attribute muss kleiner oder gleich :value sein.',
        'file'                    => 'Das :Attribut muss kleiner oder gleich :value Kilobyte sein.',
        'string'                  => 'Das :attribute muss kleiner oder gleich :value Zeichen sein.',
        'array'                   => 'Das :attribute darf nicht mehr als :value Elemente haben.',
    ],
    'max'                         => [
        'numeric'                 => 'Das :Attribut darf nicht größer als :max sein.',
        'file'                    => 'Das :Attribut darf nicht größer als :max Kilobyte sein.',
        'string'                  => 'Das :attribute darf nicht größer als :max Zeichen sein.',
        'array'                   => 'Das :attribute darf nicht mehr als :max Elemente haben.',
],
    'mimes'                       => 'Das :attribute muss eine Datei des Typs: :values ​​sein.',
    'mimetypes'                   => 'Das :attribute muss eine Datei des Typs: :values ​​sein.',
    'min'                         => [
        'numeric'                 => 'Das :Attribut muss mindestens :min sein.',
        'file'                    => 'Das :Attribut muss mindestens :min Kilobyte groß sein.',
        'string'                  => 'Das :Attribut muss mindestens :min Zeichen lang sein.',
        'array'                   => 'Das :attribute muss mindestens :min Elemente haben.',
    ],
    'not_in'                      => 'Das ausgewählte :Attribut ist ungültig.',
    'not_regex'                   => 'Das :Attribut-Format ist ungültig.',
    'numeric'                     => 'Das :Attribut muss eine Zahl sein.',
    'present'                     => 'Das Feld :attribute muss vorhanden sein.',
    'regex'                       => 'Das :Attribut-Format ist ungültig.',
    'required'                    => 'Das Feld :attribute ist erforderlich.',
    'required_if'                 => 'Das Feld :attribute ist erforderlich, wenn :other :value ist.',
    'required_unless'             => 'Das Feld :attribute ist erforderlich, es sei denn, :other ist in :values ​​enthalten.',
    'required_with'               => 'Das Feld :attribute ist erforderlich, wenn :values ​​vorhanden ist.',
    'required_with_all'           => 'Das Feld :attribute ist erforderlich, wenn :values ​​vorhanden ist.',
    'required_without'            => 'Das Feld :attribute ist erforderlich, wenn :values ​​nicht vorhanden ist.',
    'required_without_all'        => 'Das Feld :attribute ist erforderlich, wenn keiner der :values ​​vorhanden ist.',
    'same'                        => 'Das :attribute und :other müssen übereinstimmen.',
    'size'                        => [
        'numeric'                 => 'Das :attribute muss :size sein.',
        'file'                    => 'Das :attribute muss :size kilobytes sein.',
        'string'                  => 'Das :Attribut muss :size Zeichen sein.',
        'array'                   => 'Das :attribute muss :size-Elemente enthalten.',
    ],
    'string'                      => 'Das :attribute muss ein String sein.',
    'timezone'                    => 'Das :Attribut muss eine gültige Zone sein.',
    'unique'                      => 'Das :Attribut wurde bereits vergeben.',
    'uploaded'                    => 'Das :Attribut konnte nicht hochgeladen werden.',
    'url'                         => 'Das :Attribut-Format ist ungültig.',
    "account_not_confirmed"       => "Ihr Konto wurde nicht bestätigt, bitte überprüfen Sie Ihre E-Mail",
  "user_suspended"                => "Ihr Konto wurde gesperrt, bitte kontaktieren Sie uns bei einem Fehler",
  "letters"                       => "Das :attribute muss mindestens einen Buchstaben oder eine Zahl enthalten",
    'video_url'                   => 'Ungültige URL unterstützt nur Youtube und Vimeo.',
    'update_max_length'           => 'Der Beitrag darf nicht länger als :max Zeichen sein.',
    'update_min_length'           => 'Der Beitrag muss mindestens :min Zeichen lang sein.',
    'video_url_required'          => 'Das Feld Video-URL ist erforderlich, wenn es sich bei den vorgestellten Inhalten um Videos handelt.',

    /*
    |------------------------------------------------------------- -------------------------
    | Benutzerdefinierte Validierungssprachzeilen
    |------------------------------------------------------------- -------------------------
    |
    | Hier können Sie mithilfe von benutzerdefinierte Validierungsmeldungen für Attribute angeben
    | Konvention "attribute.rule", um die Zeilen zu benennen. Dadurch geht es schnell
    | Geben Sie eine bestimmte benutzerdefinierte Sprachzeile für eine bestimmte Attributregel an.
    |
    */

    'benutzerdefiniert'           => [
        'Attributname'            => [
            'Regelname'           => 'Benutzerdefinierte Nachricht',
        ],
    ],

    /*
    |------------------------------------------------------------- -------------------------
    | Benutzerdefinierte Validierungsattribute
    |------------------------------------------------------------- -------------------------
    |
    | Die folgenden Sprachzeilen werden verwendet, um Attributplatzhalter auszutauschen
    | mit etwas leserfreundlicherem wie E-Mail-Adresse
    | von "E-Mail". Dies hilft uns einfach, Nachrichten ein wenig sauberer zu gestalten.
    |
    */

    'Attribute'                   => [
  'agree_gdpr'                    => 'Box Ich stimme der Verarbeitung personenbezogener Daten zu',
      'agree_terms'               => 'Kästchen Ich stimme den Allgemeinen Geschäftsbedingungen zu',
      'agree_terms_privacy'       => 'Kästchen Ich stimme den Allgemeinen Geschäftsbedingungen und der Datenschutzrichtlinie zu',
  'full_name'                     => 'Vollständiger Name',
      'Name'                      => 'Name',
  'username'                      => 'Benutzername',
      'username_email'            => 'Benutzername oder E-Mail',
  'E-Mail'                        => 'E-Mail',
  'password'                      => 'Passwort',
  'password_confirmation'         => 'Passwortbestätigung',
  'Website'                       => 'Website',
  'location'                      => 'Location',
  'countries_id'                  => 'Land',
  'twitter'                       => 'Twitter',
  'facebook'                      => 'Facebook',
  'google'                        => 'Google',
  'instagram'                     => 'Instagram',
  'comment'                       => 'Kommentar',
  'title'                         => 'Titel',
  'description'                   => 'Beschreibung',
      'old_password'              => 'Altes Passwort',
      'new_password'              => 'Neues Passwort',
      'email_paypal'              => 'E-Mail an PayPal',
      'email_paypal_confirmation' => 'PayPal-Bestätigung per E-Mail',
      'bank_details'              => 'Bankverbindung',
      'video_url'                 => 'Video-URL',
      'categories_id'             => 'Kategorie',
      'story'                     => 'Geschichte',
        'image'                   => 'Bild',
      'Avatar'                    => 'Avatar',
      'message'                   => 'Nachricht',
      'profession'                => 'Beruf',
      'thumbnail'                 => 'Miniaturbild',
      'address'                   => 'Adresse',
      'city'                      => 'Stadt',
      'zip'                       => 'Post/PLZ',
      'payment_gateway'           => 'Zahlungsgateway',
      'payment_gateway_tip'       => 'Zahlungsgateway',
      'MAIL_FROM_ADDRESS'         => 'E-Mail keine Antwort',
      'FILESYSTEM_DRIVER'         => 'Datenträger',
      'price'                     => 'Preis',
      'amount'                    => 'Betrag',
      'birthdate'                 => 'Geburtsdatum',
      'navbar_background_color'   => 'Hintergrundfarbe der Navigationsleiste',
    'navbar_text_color'           => 'Navbar-Textfarbe',
    'footer_background_color'     => 'Hintergrundfarbe der Fußzeile',
    'footer_text_color'           => 'Fußzeilentextfarbe',

      'AWS_ACCESS_KEY_ID'         => 'Amazon Key', // Keine notwendige Bearbeitung
      'AWS_SECRET_ACCESS_KEY'     => 'Amazon Secret', // Keine notwendige Bearbeitung
      'AWS_DEFAULT_REGION'        => 'Amazonas-Region', // Keine notwendige Bearbeitung
      'AWS_BUCKET'                => 'Amazon Bucket', // Nicht notwendig bearbeiten

      'DOS_ACCESS_KEY_ID'         => 'DigitalOcean Key', // Nicht notwendig bearbeiten
      'DOS_SECRET_ACCESS_KEY'     => 'DigitalOcean Secret', // Keine notwendige Bearbeitung
      'DOS_DEFAULT_REGION'        => 'DigitalOcean Region', // Nicht notwendig bearbeiten
      'DOS_BUCKET'                => 'DigitalOcean Bucket', // Nicht notwendig bearbeiten

      'WAS_ACCESS_KEY_ID'         => 'Wasabi Key', // Nicht notwendig bearbeiten
      'WAS_SECRET_ACCESS_KEY'     => 'Wasabi-Geheimnis', // Nicht notwendig bearbeiten
      'WAS_DEFAULT_REGION'        => 'Wasabi-Region', // Nicht notwendig bearbeiten
      'WAS_BUCKET'                => 'Wasabi-Eimer', // Nicht notwendig bearbeiten

      //===== v2.0
      'BACKBLAZE_ACCOUNT_ID'      => 'Backblaze-Konto-ID', // Keine notwendige Bearbeitung
      'BACKBLAZE_APP_KEY'         => 'Backblaze Master Application Key', // Nicht notwendig bearbeiten
      'BACKBLAZE_BUCKET'          => 'Backblaze-Bucket-Name', // Keine notwendige Bearbeitung
      'BACKBLAZE_BUCKET_REGION'   => 'Backblaze Bucket Region', // Nicht notwendig bearbeiten
      'BACKBLAZE_BUCKET_ID'       => 'Backblaze Bucket Endpoint', // Nicht notwendig bearbeiten

      'VULTR_ACCESS_KEY'          => 'Vultr Key', // Nicht notwendig bearbeiten
      'VULTR_SECRET_KEY'          => 'Vultr Secret', // Nicht notwendig bearbeiten
      'VULTR_REGION'              => 'Vultr-Region', // Nicht notwendig bearbeiten
      'VULTR_BUCKET'              => 'Vultr Bucket', // Nicht notwendig bearbeiten
  ],

];
