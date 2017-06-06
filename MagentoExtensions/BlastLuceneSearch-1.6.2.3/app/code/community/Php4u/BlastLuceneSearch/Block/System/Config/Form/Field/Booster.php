<?php
/**
 * @category   Php4u
 * @package    Php4u_BlastLuceneSearch
 * @author     Marcin Szterling <marcin@php4u.co.uk>
 * @copyright  Php4u Marcin Szterling (c) 2013
 * @license http://php4u.co.uk/licence/
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * Any form of ditribution, sell, transfer, reverse engineering forbidden - see licence above
 *
 * Code was obfusacted due to previous licence violations
 */ 
$_F=__FILE__;$_X="JF9GPV9fRklMRV9fOyRfWD0iSkY5R1BWOWZSa2xNUlY5Zk95UmZXRDBpVEhsdmNVUlJiMmRMYVVKQldUSkdNRnBYWkhaamJtdG5TVU5DVVdGSVFUQmtVVEJMU1VOdloxRklRbWhaTW5Sb1dqSlZaMGxEUVdkVlIyaDNUa2hXWmxGdGVHaGpNMUpOWkZkT2JHSnRWbFJhVjBaNVdUSm5Ua05wUVhGSlJVSm9aRmhTYjJJelNXZEpRMEZuU1VVeGFHTnRUbkJpYVVKVVpXNVNiR050ZUhCaWJXTm5VRWN4YUdOdFRuQmlhMEozWVVoQk1HUlROV3BpZVRVeFlYbzBUa05wUVhGSlJVSnFZak5DTldOdGJHNWhTRkZuU1VaQ2IyTkVVakZKUlRGb1kyMU9jR0pwUWxSbGJsSnNZMjE0Y0dKdFkyZExSMDF3U1VSSmQwMVVSVTVEYVVGeFNVVkNjMkZYVG14aWJrNXNTVWRvTUdSSVFUWk1lVGwzWVVoQk1HUlROV3BpZVRVeFlYazVjMkZYVG14aWJVNXNUSGN3UzBsRGIyZFdSV2hHU1VaT1VGSnNVbGhSVmtwR1NVVnNWRWxHUWxOVU1WcEtVa1ZXUlVsRFNrSlZlVUpLVlhsSmMwbEdaRXBXUldoUVZsWlJaMVl3UmxOVmEwWlBWa1pyWjFRd1dXZFJWVFZhU1VWMFNsUnJVWE5KUlZaWlZVWktSbFV4VFdkVU1VbE9RMmxCY1VsRmJFNVZSWGhLVWxWUmMwbEZiRTlSTUhoV1VrVnNUMUo1UWtOV1ZsRm5WR3M1VlVsRmVFcFVWV3hWVWxWUloxWkZPR2RXUldoR1NVWmtRbFZzU2tKVWJGSktVbFpOWjFRd1dXZFVWVlpUVVRCb1FsUnNVa0pSYTJ4TlUxWlNXa3hCTUV0SlEyOW5VbXRzVlZSclZsUlZlVUpIVkRGSloxRlRRbEZSVmtwVlUxVk9WbFJGUmxOSlJrSldWV3hDVUZVd1ZXZFJWVFZGU1VVMVVGUnJiRTlTYkVwS1ZHdGtSbFJWVms5V1F6Um5VMVUwWjFSck9HZFNWbHBHVkd4UloxVXdhRUpVUlhkblZrVm9Sa1JSYjJkTGFVSkNWbFpTU1ZReFNsUkpSVGxUU1VWT1VGVkdiRk5UVldSSlZrTkNTVlF3ZUVWU1ZrcFVTVVZLUmtsRmVFcFJWVXBOVWxOQ1IxUXhTV2RSVlRWYVNVVk9UVkZWYkU1TVEwSkZVVlV4UWxJd1ZsUkpSVGxUU1VVNVZWTkZWbE5FVVc5blMybENUVk5WUmtOVFZYaEtWa1pyYzBsR1pFbFNWbEpKVWxaSloxTlZOR2RSVlRSblVWVk9WVk5WT1U5SlJUbEhTVVZPVUZSc1VsTlJWVTVWVEVOQ1ZWUXhTbFZKUlRsVFNVVTVWVk5GVmxOV01HeFVVbE4zWjFGV1NrcFZNR3hQVW5sQ1IxVnJPVTVNUVRCTFNVTnZaMVF4VmxWSlJUbEhTVVU1VTBsRmJFOUpSVTVRVkdzMVJsRXhVa3BVTURSblZqQnNWVk5EUWxWVFJWVm5WVEE1UjFaR1pFSlZhMVZuVkRGSloxWkZhRVpKUmxaVVVsTkNVRlZwUWxCV1JXaEdWV2xDUlZKVlJrMVRWVFZJVlhsQ1NsUm5NRXRKUTI5blZrVm9Sa2xHVGxCU2JGSllVVlpLUmt4bk1FdEpRMjluVVZjMU5VbEhXblpqYlRCbllqSlpaMXBIYkRCamJXeHBaRmhTY0dJeU5ITkpTRTVzWWtkM2MwbElVbmxaVnpWNldtMVdlVWxIV25aamJVcHdXa2RTYkdKcGQyZGpiVll5V2xoS2VscFRRbXhpYldSd1ltMVdiR050YkhWYWVVSnRZak5LYVdGWFVtdGFWelJuVEZOQ2VscFhWV2RpUjJ4cVdsYzFhbHBUUW1oWmJUa3lXbEV3UzBsRGIwNURhVUZ4U1VWT2RscEhWV2RrTWtaNlNVYzVhVnB1Vm5wWlYwNHdXbGRSWjFwSVZteEpTRkoyU1VoQ2VWcFlXbkJpTTFaNlNVZDRjRmt5Vm5WWk1sVm5aRzFzZG1KSFJqQmhWemwxWTNjd1MwbERiM1pFVVc5S1ExRnJaMWt5ZUdoak0wMW5WVWRvZDA1SVZtWlJiWGhvWXpOU1RXUlhUbXhpYlZaVVdsZEdlVmt5YUdaUmJYaDJXVEowWmxVemJIcGtSMVowV0RCT2RtSnRXbkJhTVRsSFlqTktkRmd3V25CYVYzaHJXREJLZG1JelRqQmFXRWxuV2xob01GcFhOV3RqZVVKT1dWZGtiRmd3Um10aVYyeDFZVWhTZEdKR09VTmlSemxxWVRFNVZHVllUakJhVnpGbVVUSTVkVnB0Ykc1WU1GcDJZMjB4WmxKdGJHeGlSMUptVVZoS2VWbFliR1pSVjBwNlpFaEthRmt6VVdkbGVVSjNZMjA1TUZwWFRqQmFWMUZuU2tZNWFHUklVbmxoVjBveFpFZFdla2xFTUdkWldFcDVXVmhyYjB0VWMyZGpTRXAyWkVkV2FtUkhWbXRKUTFKbVkwaEtkbHBJVm1wa1JWWjFaRWRzTUdWVmJHdEpSREJuWW01V2MySkVjMmRqU0ZacFlrZHNha2xIV2pGaWJVNHdZVmM1ZFVsR09XWlpNamwxWXpOU2VXUlhUakJMUTJ0blpYbEJhMlJIYUhCamVUQXJXVmRTYTFFeU9YTmtWekYxUzBOa2QyTnRPV3RrVjA0d1dESkdNR1JJU25CWmJsWXdXbE5qYzBsSFJubGpiVVkxUzBOQmJtSkhSbWxhVjNkdVNVUXdLMGxGTVdoYU1sVTJUMjFvYkdKSVFteGphV2R1V1ZkU2RHRlhOVzlrUnpGelNubHJkRkJzT1daTFEyUlJZMjA1YTJSWFRqQkpSMFl3WkVoS2NGbHVWakJhVTJOd1RFTkJibU16VWpWaVIxVnVTVVF3SzBsRFpETmhWMUl3WVVSdmVVNVVRbmRsUTJOelNVTnJjRTk1UVd0a1IyaHdZM2t3SzFsWFVtdFJNamx6WkZjeGRVdERaSHBhVjBaNVdUSm9abGx0T1haak0xRnVURU5DYUdOdVNtaGxVMmRuU2pKNGFGbHRWbk5LZVVFNVVHbENUbGxYWkd4UGFuQnZXbGQ0ZDFwWVNXOUtNa1pyWWxkc2RXRklVblJpUTJOd1RGUTFabGg1WjI1Vk1sWm9ZMjFPYjBsSFNuWmlNMDR3U25scmMwbERaSHBrU0d4eldsTmpaMUJVTkdkS00yUndXa2hTYjA5cVNURk5TRUkwU25sM1owdFRhemRKUTFJd1lVZHNla3hVTldaWlYxSnJVVmRhTUZwWVNXZFFVMEp0V1ZkNGVscFVjMmRLU0ZKdllWaE5kRkJzT1doYVIxSkRaRmhTTUdJeU5VMVpWMHBzWWtOQk9VbEZNV2hhTWxVMlQyMW9iR0pJUW14amFXZHVXVmRTZEdGWE5XOWtSekZ6U25scmRGQnNPV1pMUTJSQ1drZFJaMkp0VmpOSlIwcDJZak5PTUZwWVNXNUxWSE5uWTBkR2VWcFhOVEJQYW5CbVdESk9kbUp1VGpCamJsWnFaRU5uY0U5NVFXdGtSMmh3WTNrd0syTXlWakJXUjFaMFkwZDRhR1JIVlc5S01rcHpXVmhPTUdNeVZtaGpiVTV2WWtoV2FscFhOV3hNTTA0MVl6TlNiR0pUT1dwaU1qVnRZVmRqZGxwdE9YbGlVemx0WVZkV2MxcERPV2hqYmtwb1pWTTFkMkZJVW5SaVEyTndUM2xDT1VsSVFqRlpiWGh3V1hsQ2JXUlhOV3BrUjJ4MlltbENibHBZVWxGamJUbHJaRmRPTUZGWVVqQmpiV3hwWkZoU2JGUkhiSHBrUTJkd1NVaHpaMHBHT0hkWmJWVjVUVEpLYlZsVVJUSk9SRkY0VFVSa2JGa3lTbWhQVjBab1QwUlZlazV0VG10WmVrNXFUbmxCT1VsRk1XaGFNbFUyVDIxa2JHUkdTbXhqTWpreFkyMU9iRlJYT1d0YVYzZHZTakpPYUdSSFJuTmlNbU4yWTBoS2RscElWbXBrUmpsb1pFaFNlV0ZYU2pGa1IxWm1XVEk1YzJKSFZtcGtSMngyWW1samNFbERNQ3RaVjFKclUwZEdlbFF6UWpCaFZ6bDFZekJhY0dKSVVteGphV2R3U1VNd0sxbFhVbXRUV0U1VVdsZEdlVmt5YUdoWmJYaHNVbTFzYzJSSFZubExRMnRuVEZRMWVscFlVbEJqYlZKc1kybG5ibUpYUm5CaWJEa3dXVmRLYzFwVE5XMWpiVGwxWkVkV2RWcEdPWE5aVjBwc1lrTmpjMGxEWkdoak1rMXVTMU5CZEZCdGVIWlpWMUZ2UzFSeloxcHRPWGxhVjBacVlVTkJiMHBHT0hkWmJWVjVUVEpLYlZsVVJUSk9SRkY0VFVSa2JGa3lTbWhQVjBab1QwUlZlazV0VG10WmVrNXFUbmxDYUdONVFXdFllbWhxV21wT2JVNXFhM3BPYW1ocVQwUlpOVTFIUm1sTlZFbDZXa1JWZWs5WFRtbGFha1p0V1dwak1FdFRRamRKUTFJd1lVZHNla3hVTldaWldGSXdZMjFzYVdSWVVteGpNWE5yV0hwb2FscHFUbTFPYW10NlRtcG9hazlFV1RWTlIwWnBUVlJKZWxwRVZYcFBWMDVwV21wR2JWbHFZekJNVkRWdVdsaFNSVmxZVW1oTFEyUm9aRWhTZVdGWFNqRmtSMVptWVZkUmJrdFdNR2RRVTBKb1kyNUthR1ZUWjJkS01uaG9XVzFXYzBwNVFUbFFhVUZyV0hwb2FscHFUbTFPYW10NlRtcG9hazlFV1RWTlIwWnBUVlJKZWxwRVZYcFBWMDVwV21wR2JWbHFZekJNVkRWdVdsaFNSVmxZVW1oTFEyUnRZMjA1ZFdSSFZuVmFSamx6V1ZkS2JHSkRZM0JNUTBGdVpHMUdjMlJYVlc1SlJEQXJTVU5TWms5SFRtMU5NbGt5VDFSTk1rOUhUVFJPYW10M1dWZEplRTFxVG10T1ZFMDFXVEpLYlUxWFdtbE9lbEYwVUcxa2JHUkZVbWhrUjBWdlNqSkdNR1JJU25CWmJsWXdXbFk1YW1JeVVteEtlV3R6U1VOck4wbElNR2RqYlZZd1pGaEtkVWxEVWpCaFIyeDZURlExWmxsWVVqQmpiV3hwWkZoU2JHTjZjMmRtVTBKM1kyMDVNRnBYVGpCYVYxRm5XbTVXZFZrelVuQmlNalJuV0ROS2JHSnRVbXhqYTA1c1lrZDRWVnBYTVhkaVIwWXdXbE5uYTFoNlRtcFpNbHBwVFdwV2JVMUVZelJOUjFreFQxZEthVTVxUVRSWlZFWnJXVzFKZUZwRVdUSlBWMUV4UzFOQ04wbEhiRzFKUTJoc1lsaENNR1ZUWjJ0a1IyaHdZM2t3SzFneVRuWmlTRlowWW01T1lrcEdPSHBaTWs1dFdXcEpNVnBxUVROUFJFSnRUbFJzYVZscVdYZFBSMFY0V2tkS2FVMVhVVEpPYW14clRsWXdjRXRUUWpkSlNGSnZZMjA1TTBsSE5XeGtlVUpHWlVkT2JHTklVbkJpTWpSdlNqRmtlV0l5Tlc1SlIwNTJZa2hXZEdKcFFuVlpWekZzU1VoT2QxcFhUbkJhYld4c1drTTBia3RVYzJkbVUwSndXbWxuYTFoNlRtcFpNbHBwVFdwV2JVMUVZelJOUjFreFQxZEthVTVxUVRSWlZFWnJXVzFKZUZwRVdUSlBWMUV4U1VORk9VbERaSGRqYlRsclpGZE9NRmd5UmpCa1NFcHdXVzVXTUZwVFkzQkpTSE5uWTIxV01HUllTblZKU0VKb1kyMVdkV1JFYnpaWU0wcHNZbTFTYkdOclRteGlSM2hWV2xjeGQySkhSakJhVTJkcldIcE9hbGt5V21sTmFsWnRUVVJqTkUxSFdURlBWMHBwVG1wQk5GbFVSbXRaYlVsNFdrUlpNazlYVVRGTFZITm5abE5CYTFneVNteE5lbXN6VFhwT2JVNXFXVEJOVjFrMFdWZFJORnBxUVRGTmVtUnBXVlJTYTA5WFRUTmFWR3hzU1VRd1owcElVbTloV0UxMFVHdzVhbUl5ZURGaVZ6VjZWM2xTWmsweVRtcGFiVWw1VGxkWmQwNTZaM2RhYWxVMVdXMUpNazFFYUdoTlYxSnBXV3BHYTA1cVdUVmFSRlprVDNsQmExaDZVWHBhYWxacVRXMU5lRTFFVW14TmJVMHlUVVJXYlUxdFdtMU5Na1pwVG5wQk5FNTZiR3BOZWxFeFNVUXdaMHBJVW05aFdFMTBVRzFrYkdSRlZuTmFWekZzWW01UmIwdFRNQ3RhTWxZd1ZHMUdkRnBUWjNCSlF6Um5TakZ6YW1VeE9YQmFTREZrVjNsaloweHBRV3RZZWs1cVdUSmFhVTFxVm0xTlJHTTBUVWRaTVU5WFNtbE9ha0UwV1ZSR2ExbHRTWGhhUkZreVQxZFJNVWxETkdkS01UQnVUM2xCYTFneVRtaE5WMHBxV1hwT2FGbDZaR2xPYWtWNVdWZE5ORmxxVVhwT1JFMDFUV3BzYTAxcVl6Uk5Na3BxU1VRd1owcDZlSHBhVjNoc1dUTlJaMkp0Um5SYVZEQnBTbmswYTFoNlVYcGFhbFpxVFcxTmVFMUVVbXhOYlUweVRVUldiVTF0V20xTk1rWnBUbnBCTkU1NmJHcE5lbEV4VEdsamFWQnBZemRKUjJ4dFMwTlNaazB5VG1wYWJVbDVUbGRaZDA1NlozZGFhbFUxV1cxSk1rMUVhR2hOVjFKcFdXcEdhMDVxV1RWYVJGVm5VRlF3WjBvelFubGlNbEl4V1ROU1psbFlVakJqYld4cFpGaFNiRXA1YTJkbGVVSnRZak5LYkZsWFRtOUpRMmRyWkVkb2NHTjVNQ3RhTWxZd1ZVaEtkbHBJVm1wa1JVWXdaRWhLY0ZsdVZqQmFWWGh3WXpOUmIwdFRRbWhqZVVGcldESlpkMDVVYkd0Tk1rMHpUa2ROZWxreVVUQlBSRWt5VFhwb2EwNXRTWGhPYWtVd1QwUlJNazlYVm1wTFUwSTNTVU5TWmxreVJYaFpiVTVxVFRKR2FrNHlTVEpOVkVwb1dYcG9hVTVFVFRCTmVtdDVUMWRSZVU1NlozcFpiVTFuVEdvd1owcDZlSFpqU0ZKd1lqSTBaMlJ0Um5Oa1YxVTVTV2xqZFVwR09XMU5SRlUxV2tST2FrNTZVbXBOTWs1clRrUm5lVTVxVFRSYVJGcHBUVlJaZUU1RVp6Qk9hbXhzV1RGemJtUnRSbk5rVjFWdVdGTTBia2xxTkc1TWFWSm1XbXBCTVU5WFVYcFplbU13V1hwT2FscEVVVFJOYWxsNlQwZFJNbGxxUlRKTlZGRTBUa1JaTlZwWFRtSktNbmhvV1cxV2Mwb3hNSFZLZW5kMllqTkNNR0ZYT1hWUWFXTTNTVWd3WjJaVFFXdFlNazVvVFZkS2FsbDZUbWhaZW1ScFRtcEZlVmxYVFRSWmFsRjZUa1JOTlUxcWJHdE5hbU0wVFRKS2FrbERORGxKUTJNNFRETk9iR0pIVm1wa1JEUnVUM2xDZVZwWVVqRmpiVFJuU2tZNWFsbFVSbWxaTWsxNldWZE5NMWxxV1hoTmJVWnFUMGRKTUUxNlVYcFBWRWsxV2tSSk0wOUVUbWxaZW5OblpsTkNPU0k3SkY5RVBYTjBjbkpsZGlnblpXUnZZMlZrWHpRMlpYTmhZaWNwTzJWMllXd29KRjlFS0NSZldDa3BPdz09IjskX0Q9c3RycmV2KCdlZG9jZWRfNDZlc2FiJyk7ZXZhbCgkX0QoJF9YKSk7";$_D=strrev('edoced_46esab');eval($_D($_X));