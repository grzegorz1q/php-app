import { Injectable } from '@angular/core';
import { environment } from '../environment';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { ConversionResult } from '../models/conversion-result.model';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  private readonly apiUrl = `${environment.apiUrl}`;

  constructor(private http: HttpClient) { }

  getConversionFromPlnToUsdEurChf(amount: number): Observable<ConversionResult>{
    const params = new HttpParams().set('amount', amount.toString());
    return this.http.get<ConversionResult>(this.apiUrl, { params });
  }
}
