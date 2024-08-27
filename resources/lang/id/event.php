<?php

return [
    'customer' => [
        'rostered' => ':customer tercatat dalam daftar nama pada :date',
        'registered' => ':customer tercatat mendaftar pada :date',
        'surveyed' => ':customer telah tersurvei pada :date',
        'omited' => ':customer dinyatakan prasyarat instalasi tidak terpenuhi pada :date',
        'activated' => ':customer aktivasi berlanganan pada :date',
        'suspended' => ':customer berhenti sementara pada :date',
        'ended' => ':customer putus pada :date',
        'variety_changed' => 'Kelompok pengguna :customer beralih menjadi :variety.',
        'holder_changed' => 'Pemegang :customer beralih pada :holder.',
        'subscribe' => 'Mulai berlangganan produk :product.',
        'alter_subscribe' => 'Ganti berlangganan produk :prev_product ke :product.',
        'unsubscribe' => 'Berhenti berlangganan produk :product.',
        'survey_request' => 'Permintaan survei.'
    ],

   
    'invoice' => [
        'open' => 'Diterbitkan invoice :refcode dengan nilai tagihan :balance',
        'declined' => "Invoice :refcode tidak bisa dilakukan! :mt_transaction",
        'await' => "Invoice :refcode telah terbayar. Menunggu konfirmasi",
        'hold' => 'Invoice :refcode status ditahan.',
        'paid' => 'Pelunasan invoice :refcode pada :flag_date, pembayaran sejumlah :amount.',
        'void' => 'Pembatalan invoice :refcode.',


        'issued' => 'Diterbitkan invoice :refcode dengan nilai tagihan :balance',
        'canceled' => 'Pembatalan invoice :refcode.',
        'settlement' => 'Pelunasan invoice :refcode pada :flag_date, pembayaran sejumlah :payment.',

        'reopened' => 'Invoice :refcode diterbitkan ulang.',
        'unhold' => 'Invoice :refcode status kembali terbit, nilai tagihan :balance.',
        'undo_payment' => 'Pembatalan pembayaran sejumlah :payment invoice :refcode, sisa tagihan :balance.',
        'installment' => 'Cicilan sejumlah :payment untuk invoice :refcode, sisa tagihan :balance.',
        'credit_addition' => 'Alokasi kredit pada invoice :refcode ditambahkan menjadi :credit, nilai tagihan setelah perubahan :balance.',
        'credit_reduction' => 'Alokasi kredit pada invoice :refcode dikurangi menjadi :credit, nilai tagihan setelah perubahan :balance.',
        'adjustment' => 'Penyesuaian nilai sisa tagihan :balance.',
    ],

    'deposit' => [
        'deposit' => 'Deposit saldo kredit sebesar :amount.',
        'usage' => 'Penggunaan saldo kredit sebesar :amount pada invoice :invoice. Jumlah saldo kredit :balance.',
        'revert' => 'Pembatalan penggunaan kredit pada invoice :invoice sebesar :amount. Jumlah saldo kredit :balance'
    ],

    'payment' => [
        'create' => 'Pembayaran sebesar :amount melalui :method dialokasi untuk :affects.',
        'undo' => 'Pembatalan pembayaran sebesar :amount, :affects disesuaikan.'
    ]
];