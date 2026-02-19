<?php

use Illuminate\Support\Facades\DB;

function application()
{
    return DB::table('applications')->first();
}

function contact_person()
{
    return DB::table('contacts')
        ->where('type', 'person')
        ->where('status', 'active')
        ->orderBy('id', 'desc')
        ->first();
}

function unread_messages_count(): int
{
    try {
        return (int) DB::table('messages')->where('is_read', 0)->count();
    } catch (\Throwable $e) {
        return 0;
    }
}

function total_messages_count(): int
{
    try {
        return (int) DB::table('messages')->count();
    } catch (\Throwable $e) {
        return 0;
    }
}

function replied_messages_count(): int
{
    try {
        return (int) DB::table('messages')->whereNotNull('replied_at')->count();
    } catch (\Throwable $e) {
        return 0;
    }
}

function unreplied_messages_count(): int
{
    try {
        return (int) DB::table('messages')->whereNull('replied_at')->count();
    } catch (\Throwable $e) {
        return 0;
    }
}

function normalize_project_duration(?string $duration, string $status): ?string
{
    if ($duration === null) {
        return null;
    }

    $duration = trim($duration);
    if ($duration === '') {
        return null;
    }

    $status = strtolower(trim($status));
    $nowYear = (int) now()->format('Y');

    // Normalize whitespace and separators.
    $duration = preg_replace('/\s+/', ' ', $duration);
    $duration = str_replace(["–", "—"], '-', $duration);
    $duration = preg_replace('/\s*-\s*/', ' - ', $duration);
    $duration = preg_replace('/\s*to\s*/i', ' to ', $duration);

    // Extract years where possible.
    if (preg_match_all('/\b(\d{4})\b/', $duration, $yearMatches) && !empty($yearMatches[1])) {
        $years = $yearMatches[1];
        $startYear = $years[0];

        // Handle "Continue"/"Present" style endings.
        if (preg_match('/\b(continue|present|ongoing)\b/i', $duration)) {
            return $status === 'completed'
                ? ($startYear . ' to ' . $nowYear)
                : ($startYear . ' to Continue');
        }

        // If two (or more) years exist, keep first + last.
        if (count($years) >= 2) {
            $endYear = $years[count($years) - 1];
            return $status === 'ongoing'
                ? ($startYear . ' to Continue')
                : ($startYear . ' to ' . $endYear);
        }

        // Only one year present.
        if ($status === 'ongoing') {
            return $startYear . ' to Continue';
        }
    }

    // Fallback: return as-is.
    return $duration;
}

function parse_project_duration_years(?string $duration): array
{
    $duration = $duration === null ? null : trim($duration);
    if ($duration === null || $duration === '') {
        return [
            'start_year' => null,
            'end_year' => null,
            'is_continuing' => false,
        ];
    }

    $isContinuing = (bool) preg_match('/\b(continue|present|ongoing)\b/i', $duration);

    if (preg_match_all('/\b(\d{4})\b/', $duration, $matches) && !empty($matches[1])) {
        $years = $matches[1];
        $startYear = (int) $years[0];
        $endYear = null;

        if (!$isContinuing && count($years) >= 2) {
            $endYear = (int) $years[count($years) - 1];
        }

        return [
            'start_year' => $startYear,
            'end_year' => $endYear,
            'is_continuing' => $isContinuing,
        ];
    }

    return [
        'start_year' => null,
        'end_year' => null,
        'is_continuing' => $isContinuing,
    ];
}

function project_period($project): ?string
{
    $status = strtolower((string) data_get($project, 'status', 'ongoing'));
    $startYear = data_get($project, 'start_year');
    $endYear = data_get($project, 'end_year');
    $isContinuing = (bool) data_get($project, 'is_continuing', false);

    if (!empty($startYear)) {
        $startYear = (int) $startYear;

        if ($status === 'ongoing' || $isContinuing) {
            return $startYear . ' to Continue';
        }

        if (!empty($endYear)) {
            return $startYear . ' to ' . ((int) $endYear);
        }

        return $startYear . ' to ' . ((int) now()->format('Y'));
    }

    $legacy = data_get($project, 'project_duration');
    if ($legacy !== null) {
        return normalize_project_duration((string) $legacy, $status);
    }

    return null;
}









