<?php

namespace Xhgui\Profiler\Profilers;

use Xhgui\Profiler\ProfilingFlags;

/**
 * A simple & straight-to-the-point PHP profiling extension
 *
 * @see https://github.com/NoiseByNorthwest/php-spx
 */
class SpxProfiler extends AbstractProfiler
{
    const EXTENSION_NAME = 'spx';

    public function isSupported()
    {
        return extension_loaded(self::EXTENSION_NAME);
    }

    public function enable($flags = array(), $options = array())
    {
        spx_profiler_start();
    }

    /**
     * {@inheritdoc}
     */
    public function disable()
    {
        return spx_profiler_stop();
    }

    /**
     * {@inheritdoc}
     */
    public function getProfileFlagMap()
    {
        return array(
            ProfilingFlags::CPU => 0,
            ProfilingFlags::MEMORY => 0,
            ProfilingFlags::NO_BUILTINS => 0,
            ProfilingFlags::NO_SPANS => 0,
        );
    }
}
