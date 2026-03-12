<?php

use App\Models\Settings;

if (!function_exists('setting')) {
    /**
     * Get a setting value by key
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting($key, $default = null)
    {
        return Settings::getSetting($key, $default);
    }
}

if (!function_exists('updateSetting')) {
    /**
     * Update or create a setting
     *
     * @param string $key
     * @param mixed $value
     * @param string|null $description
     * @param string $category
     * @param string $type
     * @return \App\Models\Settings
     */
    function updateSetting($key, $value, $description = null, $category = 'general', $type = 'text')
    {
        return Settings::setSetting($key, $value, $description, $category, $type);
    }
}

if (!function_exists('getSettings')) {
    /**
     * Get all settings as an associative array
     *
     * @param string|null $category If provided, get settings only from this category
     * @return array
     */
    function getSettings($category = null)
    {
        $query = Settings::query();

        if ($category) {
            $query->where('category', $category);
        }

        return $query->pluck('value', 'key')->toArray();
    }
}

if (!function_exists('getCurrentLanguage')) {
    /**
     * Get current language from query parameter or session, default to 'en'
     *
     * @return string
     */
    function getCurrentLanguage()
    {
        // Check query parameter first
        if (request()->has('lang')) {
            $lang = request()->input('lang');
            session(['current_language' => $lang]);
            return $lang;
        }

        // Check session
        if (session()->has('current_language')) {
            return session('current_language');
        }

        // Default to English
        return 'en';
    }
}

if (!function_exists('getTranslated')) {
    /**
     * Get language-specific field value from a model - directly loads from database, no translation
     * Example: getTranslated($hero, 'title') will return $hero->title_en or $hero->title_bn based on current language
     *
     * @param mixed $model
     * @param string $fieldKey
     * @return string|null
     */
    function getTranslated($model, $fieldKey)
    {
        $lang = getCurrentLanguage();
        $fieldName = $fieldKey . '_' . $lang;

        return $model->$fieldName ?? null;
    }
}

if (!function_exists('convertToEnglishNumeral')) {
    /**
     * Convert Bengali/Bangla numerals to English numerals
     * Bengali numerals: ০ ১ ২ ৩ ৪ ৫ ৬ ৭ ৮ ৯
     * Works with any mixed numeral system
     *
     * @param string|int|null $value
     * @return int
     */
    function convertToEnglishNumeral($value)
    {
        if (is_null($value)) {
            return 0;
        }

        $value = (string)$value;

        // Bengali/Bangla digit replacements
        $bengaliDigits = array(
            '০' => '0', '১' => '1', '২' => '2', '৩' => '3', '৪' => '4',
            '৫' => '5', '৬' => '6', '৭' => '7', '৮' => '8', '৯' => '9'
        );
        // Replace Bengali numerals with English numerals
        $value = str_replace(array_keys($bengaliDigits), array_values($bengaliDigits), $value);
        // Convert to integer (removes any non-numeric characters)
        return intval($value);
    }
}

if (!function_exists('getLocalizedNumeral')) {
    /**
     * Get localized stat value - automatically loads correct language value and converts numerals
     * Much cleaner than doing ternary logic in templates
     *
     * @param mixed $model
     * @param string $fieldKey (e.g., 'stat_1', 'stat_2', 'stat_3')
     * @return int (always English numerals)
     */
    function getLocalizedNumeral($model, $fieldKey)
    {
        $lang = getCurrentLanguage();
        $fieldName = $fieldKey . '_' . $lang . '_value';

        $value = $model->$fieldName ?? 0;

        return convertToEnglishNumeral($value);
    }
}

if (!function_exists('convertToBengaliNumeral')) {
    /**
     * Convert English numerals to Bengali numerals
     * English: 0 1 2 3 4 5 6 7 8 9
     * Bengali: ০ ১ ২ ৩ ৪ ৫ ৬ ৭ ৮ ৯
     *
     * @param string|int|null $value
     * @return string
     */
    function convertToBengaliNumeral($value)
    {
        if (is_null($value)) {
            return '০';
        }

        $value = (string)$value;

        // English to Bengali digit replacements
        $bengaliDigits = array(
            '0' => '০', '1' => '১', '2' => '২', '3' => '৩', '4' => '৪',
            '5' => '৫', '6' => '৬', '7' => '৭', '8' => '৮', '9' => '৯'
        );

        // Replace English numerals with Bengali numerals
        $value = str_replace(array_keys($bengaliDigits), array_values($bengaliDigits), $value);

        return $value;
    }
}
