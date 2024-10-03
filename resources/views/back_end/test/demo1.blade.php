<!-- resources/views/translate.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Translate Example</title>
</head>

<body>
    <div>
        <label for="english">English Text:</label>
        <input type="text" id="english" onkeyup="translateText()" placeholder="Type in English">
    </div>

    <div>
        <label for="arabic">Arabic Translation:</label>
        <input type="text" id="arabic" readonly>
    </div>

    <script>
        // Simple English to Arabic word mapping
        const translationMap = {
            // # Additional Verbs(Actions)
            'write': 'يكتب',
            'draw': 'يرسم',
            'drive': 'يقود',
            'fly': 'يطير',
            'swim': 'يسبح',
            'teach': 'يعلم',
            'learn': 'يتعلم',
            'speak': 'يتكلم',
            'listen': 'يستمع',
            'help': 'يساعد',

            // # More Adjectives
            'fast': 'سريع',
            'slow': 'بطيء',
            'hard': 'صعب',
            'easy': 'سهل',
            'bright': 'ساطع',
            'dark': 'مظلم',
            'heavy': 'ثقيل',
            'light': 'خفيف',
            'old': 'قديم',
            'new': 'جديد',

            // # More Places 'market': 'سوق',
            'mall': 'مركز تجاري',
            'gym': 'صالة ألعاب رياضية',
            'church': 'كنيسة',
            'mosque': 'مسجد',
            'temple': 'معبد',
            'factory': 'مصنع',
            'farm': 'مزرعة',
            'stadium': 'ملعب',
            'theater': 'مسرح',

            // # More Household Items 'fan': 'مروحة',
            'clock': 'ساعة',
            'microwave': 'ميكروويف',
            'dishwasher': 'غسالة أطباق',
            'washing machine': 'غسالة',
            'dryer': 'مجفف',
            'vacuum': 'مكنسة كهربائية',
            'broom': 'مكنسة',
            'toaster': 'محمصة',
            'blender': 'خلاط',

            // # More Animals 'horse': 'حصان',
            'cow': 'بقرة',
            'chicken': 'دجاجة',
            'sheep': 'خروف',
            'goat': 'ماعز',
            'lion': 'أسد',
            'tiger': 'نمر',
            'elephant': 'فيل',
            'rabbit': 'أرنب',
            'snake': 'ثعبان',

            // # More Occupations 'doctor': 'طبيب',
            'nurse': 'ممرضة',
            'engineer': 'مهندس',
            'teacher': 'معلم',
            'police officer': 'شرطي',
            'firefighter': 'رجل إطفاء',
            'chef': 'طباخ',
            'pilot': 'طيار',
            'artist': 'فنان',
            'writer': 'كاتب',

            // # More Nature - Related Terms 'forest': 'غابة',
            'desert': 'صحراء',
            'ocean': 'محيط',
            'lake': 'بحيرة',
            'volcano': 'بركان',
            'island': 'جزيرة',
            'hill': 'تلة',
            'valley': 'وادي',
            'beach': 'شاطئ',
            'waterfall': 'شلال',

            // # More Transportation 'ship': 'سفينة',
            'boat': 'قارب',
            'subway': 'مترو الأنفاق',
            'motorcycle': 'دراجة نارية',
            'truck': 'شاحنة',
            'airplane': 'طائرة',
            'helicopter': 'مروحية',
            'train': 'قطار',
            'bicycle': 'دراجة هوائية',
            'scooter': 'سكوتر',

            // # More Time - Related Words 'minute': 'دقيقة',
            'hour': 'ساعة',
            'day': 'يوم',
            'week': 'أسبوع',
            'month': 'شهر',
            'year': 'سنة',
            'decade': 'عقد',
            'century': 'قرن',
            'past': 'ماضي',
            'future': 'مستقبل',

            // # More Emotions 'scared': 'خائف',
            'surprised': 'مندهش',
            'jealous': 'غيور',
            'grateful': 'ممتن',
            'worried': 'قلق',
            'embarrassed': 'محرج',
            'lonely': 'وحيد',
            'confident': 'واثق',
            'ashamed': 'خجلان',
            'curious': 'فضولي'
        };

        function translateText() {
            // Get the input text from the English textbox
            let englishText = document.getElementById('english').value.toLowerCase();

            // Split the input into words
            let words = englishText.split(' ');

            // Translate each word
            let translatedWords = words.map(word => {
                return translationMap[word] || word; // Default to English word if not found in the map
            });

            // Join the translated words and display them in the Arabic textbox
            document.getElementById('arabic').value = translatedWords.join(' ');
        }
    </script>
</body>

</html>
