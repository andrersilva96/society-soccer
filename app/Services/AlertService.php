<?php

namespace App\Services;

class AlertService
{
    public static function show($type, $message, $livewire = null)
    {
        if ($livewire) {
            // Dispatch it in resources\views\components\toast.blade.php line 1
            $livewire->dispatch($type, $message);
            return true;
        }

        return session()->flash('alert', ['type' => $type, 'message' => $message]);
    }

    public static function info($message, $livewire = null)
    {
        return self::show('info', $message, $livewire);
    }

    public static function success($message, $livewire = null)
    {
        return self::show('success', $message, $livewire);
    }

    public static function danger($message, $livewire = null)
    {
        return self::show('danger', $message, $livewire);
    }

    public static function warning($message, $livewire = null)
    {
        return self::show('warning', $message, $livewire);
    }
}
