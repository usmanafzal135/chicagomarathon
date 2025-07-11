<?php

/**
 * Check if a URL is a YouTube URL
 *
 * @param string|null $url
 * @return boolean
 */
function is_youtube( $url ) {
    if ($url !== null && is_string($url)) {
        return ( strpos( $url, 'youtube' ) !== false ) || ( strpos( $url, 'youtu.be' ) !== false );
    }
    return false;
}

/**
 * Check if a URL is a Vimeo URL
 *
 * @param string|null $url
 * @return boolean
 */
function is_vimeo( $url ) {
    if ($url !== null && is_string($url)) {
        return strpos( $url, 'vimeo' ) !== false;
    }
    return false;
}

/**
 * Get the YouTube ID from a URL
 *
 * @param string|null $url
 * @return string|false
 */
function get_youtube_id( $url ) {
    if ($url !== null && is_string($url)) {
        $regex = '~(?:(?:<iframe [^>]*src=")?|(?:(?:<object .*>)?(?:<param .*</param>)*(?:<embed [^>]*src=")?)?)?(?:https?:\/\/(?:[\w]+\.)*(?:youtu\.be/| youtube\.com| youtube-nocookie\.com)(?:\S*[^\w\-\s])?([\w\-]{11})[^\s]*)"?(?:[^>]*>)?(?:</iframe>|</embed></object>)?~ix';
        if ( preg_match( $regex, $url, $matches ) && ! empty( $matches ) ) {
            return $matches[1];
        }
    }
    return false;
}

/**
 * Get the Vimeo ID from a URL
 *
 * @param string|null $url
 * @return string|false
 */
function get_vimeo_id( $url ) {
    if ($url !== null && is_string($url)) {
        $regex = '~(?:<iframe [^>]*src=")?(?:https?:\/\/(?:[\w]+\.)*vimeo\.com(?:[\/\w]*\/videos?)?\/([0-9]+)[^\s]*)"?(?:[^>]*></iframe>)?(?:<p>.*</p>)?~ix';
        if ( preg_match( $regex, $url, $matches ) && ! empty( $matches ) ) {
            return $matches[1];
        }
    }
    return false;
}

/**
 * Get the embed URL for a video
 *
 * @param string|null $url
 * @return string|null
 */
function get_video_embed_url( $url ) {
    if ($url !== null && is_string($url)) {
        if ( is_youtube( $url ) ) {
            return 'https://www.youtube.com/embed/' . get_youtube_id( $url ) . '?autoplay=1';
        } elseif ( is_vimeo( $url ) ) {
            return 'https://player.vimeo.com/video/' . get_vimeo_id( $url ) . '?autoplay=1';
        }
    }
    return null;
}
