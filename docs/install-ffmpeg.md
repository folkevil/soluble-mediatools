## FFMpeg installation

### Linux

> Most distributions offers ffmpeg in their repositories. If you're not happy with
> their version, use a static build instead.

#### Distribution based

Ubuntu flavors:

```bash
$ sudo apt install ffmpeg
```

#### Static builds

For linux, you can easily download ffmpeg/ffprobe statically compiled binaries at

- [https://johnvansickle.com/ffmpeg/](https://johnvansickle.com/ffmpeg/)

#### Travis/CI notes 

As an example look to the [travis install script](https://github.com/soluble-io/soluble-mediatools/blob/master/.travis/travis-install-ffmpeg.sh).
