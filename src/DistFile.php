<?php

namespace Phulp;

class DistFile
{
    /**
     * @var mixed $content
     */
    private $content;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $fullpath
     */
    private $fullpath;

    /**
     * @var string $relativepath
     */
    private $relativepath;

    /**
     * @var int $lastChangeTime
     */
    private $lastChangeTime;

    /**
     * @var string $basepath
     */
    private $basepath;

    /**
     * @var string $distpathname
     */
    private $distpathname;

    /**
     * @param mixed $content,
     * @param string $name
     * @param string $fullpath
     * @param string $relativepath
     */
    public function __construct(
        $content,
        $name = null,
        $fullpath = null,
        $relativepath = null
    ) {
        $this->content = $content;
        $this->name = $name;
        $this->fullpath = $fullpath;
        $this->relativepath = $relativepath;
        if (!empty($this->name) && !empty($this->fullpath)) {
            $this->lastChangeTime = filemtime(
                rtrim($this->fullpath, DIRECTORY_SEPARATOR)
                . DIRECTORY_SEPARATOR
                . $this->name
            );
        }
        $this->basepath = rtrim(str_replace($this->relativepath, null, $this->fullpath), DIRECTORY_SEPARATOR);
        $this->distpathname = rtrim($this->relativepath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $this->name;
    }

    /**
     * Gets the value of name.
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Gets the value of content.
     *
     * @return mixed $content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Sets the value of content.
     *
     * @param mixed $content $content the content
     *
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Gets the value of fullpath.
     *
     * @return string $fullpath
     */
    public function getFullpath()
    {
        return $this->fullpath;
    }

    /**
     * Gets the value of relativepath.
     *
     * @return string $relativepath
     */
    public function getRelativepath()
    {
        return $this->relativepath;
    }

    /**
     * Gets the value of distpathname.
     *
     * @return string $distpathname
     */
    public function getDistpathname()
    {
        return $this->distpathname;
    }

    /**
     * Sets the value of distpathname.
     *
     * @param string $distpathname $distpathname the distpathname
     *
     * @return self
     */
    public function setDistpathname($distpathname)
    {
        $this->distpathname = $distpathname;

        return $this;
    }

    /**
     * Gets the value of basepath.
     *
     * @return string $basepath
     */
    public function getBasepath()
    {
        return $this->basepath;
    }

    /**
     * Gets the value of lastChangeTime.
     *
     * @return string $lastChangeTime
     */
    public function getLastChangeTime()
    {
        return $this->lastChangeTime;
    }

    /**
     * Sets the value of lastChangeTime.
     *
     * @param string $lastChangeTime $lastChangeTime the last change time
     *
     * @return self
     */
    public function setLastChangeTime($lastChangeTime)
    {
        $this->lastChangeTime = $lastChangeTime;

        return $this;
    }
}
