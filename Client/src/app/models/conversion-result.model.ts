import { CurrencyInfo } from "./currency-info.model";

export interface ConversionResult {
    date: string;
    rates: CurrencyInfo[];
}